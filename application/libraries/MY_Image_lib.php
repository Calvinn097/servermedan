<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: riyan
 * Date: 10/26/2015
 * Time: 9:40 AM
 */
class MY_Image_lib extends CI_Image_lib
{
    public $resize_and_watermark_data = array();

    function __construct()
    {
        parent::__construct();
    }

    public function initialize($props = array())
    {
        // Convert array elements into class variables
        if (count($props) > 0)
        {
            foreach ($props as $key => $val)
            {
                if (property_exists($this, $key))
                {
                    if (in_array($key, array('wm_font_color', 'wm_shadow_color')))
                    {
                        if (preg_match('/^#?([0-9a-f]{3}|[0-9a-f]{6})$/i', $val, $matches))
                        {
                            /* $matches[1] contains our hex color value, but it might be
                             * both in the full 6-length format or the shortened 3-length
                             * value.
                             * We'll later need the full version, so we keep it if it's
                             * already there and if not - we'll convert to it. We can
                             * access string characters by their index as in an array,
                             * so we'll do that and use concatenation to form the final
                             * value:
                             */
                            $val = (strlen($matches[1]) === 6)
                                ? '#'.$matches[1]
                                : '#'.$matches[1][0].$matches[1][0].$matches[1][1].$matches[1][1].$matches[1][2].$matches[1][2];
                        }
                        else
                        {
                            continue;
                        }
                    }

                    $this->$key = $val;
                }
            }
        }

        // Is there a source image? If not, there's no reason to continue
        if ($this->source_image === '')
        {
            $this->set_error('imglib_source_image_required');
            return FALSE;
        }

        /* Is getimagesize() available?
         *
         * We use it to determine the image properties (width/height).
         * Note: We need to figure out how to determine image
         * properties using ImageMagick and NetPBM
         */
        if ( ! function_exists('getimagesize'))
        {
            $this->set_error('imglib_gd_required_for_props');
            return FALSE;
        }

        $this->image_library = strtolower($this->image_library);

        /* Set the full server path
         *
         * The source image may or may not contain a path.
         * Either way, we'll try use realpath to generate the
         * full server path in order to more reliably read it.
         */
        if (($full_source_path = realpath($this->source_image)) !== FALSE)
        {
            $full_source_path = str_replace('\\', '/', $full_source_path);
        }
        else
        {
            $full_source_path = $this->source_image;
        }

        $x = explode('/', $full_source_path);
        $this->source_image = end($x);
        $this->source_folder = str_replace($this->source_image, '', $full_source_path);

        // Set the Image Properties
        if ( ! $this->get_image_properties($this->source_folder.$this->source_image))
        {
            return FALSE;
        }

        /*
         * Assign the "new" image name/path
         *
         * If the user has set a "new_image" name it means
         * we are making a copy of the source image. If not
         * it means we are altering the original. We'll
         * set the destination filename and path accordingly.
         */
        if ($this->new_image === '')
        {
            $this->dest_image = $this->source_image;
            $this->dest_folder = $this->source_folder;
        }
        elseif (strpos($this->new_image, '/') === FALSE)
        {
            $this->dest_folder = $this->source_folder;
            $this->dest_image = $this->new_image;
        }
        else
        {
            if (strpos($this->new_image, '/') === FALSE && strpos($this->new_image, '\\') === FALSE)
            {
                $full_dest_path = str_replace('\\', '/', realpath($this->new_image));
            }
            else
            {
                $full_dest_path = $this->new_image;
            }

            // Is there a file name?
            if ( ! preg_match('#\.(jpg|jpeg|gif|png)$#i', $full_dest_path))
            {
                $this->dest_folder = $full_dest_path.'/';
                $this->dest_image = $this->source_image;
            }
            else
            {
                $x = explode('/', $full_dest_path);
                $this->dest_image = end($x);
                $this->dest_folder = str_replace($this->dest_image, '', $full_dest_path);
            }
        }

        /* Compile the finalized filenames/paths
         *
         * We'll create two master strings containing the
         * full server path to the source image and the
         * full server path to the destination image.
         * We'll also split the destination image name
         * so we can insert the thumbnail marker if needed.
         */
        if ($this->create_thumb === FALSE OR $this->thumb_marker === '')
        {
            $this->thumb_marker = '';
        }

        $xp = $this->explode_name($this->dest_image);

        $filename = $xp['name'];
        $file_ext = $xp['ext'];

        $this->full_src_path = $this->source_folder.$this->source_image;
        $this->full_dst_path = $this->dest_folder.$filename.$this->thumb_marker.$file_ext;

        /* Should we maintain image proportions?
         *
         * When creating thumbs or copies, the target width/height
         * might not be in correct proportion with the source
         * image's width/height. We'll recalculate it here.
         */
        if ($this->maintain_ratio === TRUE && ($this->width !== 0 OR $this->height !== 0))
        {
            $this->image_reproportion();
        }

        /* Was a width and height specified?
         *
         * If the destination width/height was not submitted we
         * will use the values from the actual file
         */
        if ($this->width === '')
        {
            $this->width = $this->orig_width;
        }

        if ($this->height === '')
        {
            $this->height = $this->orig_height;
        }

        // Set the quality
        $this->quality = trim(str_replace('%', '', $this->quality));

        if ($this->quality === '' OR $this->quality === 0 OR ! ctype_digit($this->quality))
        {
            $this->quality = 90;
        }

        // Set the x/y coordinates
        is_numeric($this->x_axis) OR $this->x_axis = 0;
        is_numeric($this->y_axis) OR $this->y_axis = 0;

        // Watermark-related Stuff...
        if ($this->wm_overlay_path !== '')
        {
            $this->wm_overlay_path = str_replace('\\', '/', ($this->wm_overlay_path));
        }

        if ($this->wm_shadow_color !== '')
        {
            $this->wm_use_drop_shadow = TRUE;
        }
        elseif ($this->wm_use_drop_shadow === TRUE && $this->wm_shadow_color === '')
        {
            $this->wm_use_drop_shadow = FALSE;
        }

        if ($this->wm_font_path !== '')
        {
            $this->wm_use_truetype = TRUE;
        }

        return TRUE;
    }

    function simple_multiple_resize($source,$sizes,$delete_source=FALSE)
    {
        $get_size=getimagesize($source);

        foreach($sizes as $size)
        {
            if($get_size[0] <= $size)
            {
                $resize_config=array(
                    'width'=>$get_size[0],
                    'height'=>$get_size[1],
                );
            }
            else
            {
                $resize_config=array(
                    'source_image'=>$source,
                    'width'=>$size,
                    'height'=>$size,
                );
            }

            $resize_config['source_image'] =$source;
            $resize_config['create_thumb'] =TRUE;
            $resize_config['thumb_marker'] ="_s$size";

            $this->clear();
            $this->initialize($resize_config);
            $this->resize();

            if(ENVIRONMENT=='production' || ENVIRONMENT=='beta')
            {
                $this->google_storage_add_metadata($this->full_dst_path);
            }
            $data['image_path'][]=str_replace(storage_path(),'',$this->full_dst_path);

        }

        if($delete_source==TRUE)
        {
            unlink($source);
        }

        return $data;
    }

    function google_storage_add_metadata($source)
    {
        $file=getimagesize($source);
        $options = array(
            'gs' => array(
                'Content-Type' => $file['mime'],
                'Cache-Control' => 'public, max-age=604800, no-transform',
            ),
        );

        $file_name=$source;
        $ctx = stream_context_create($options);
        file_put_contents($file_name,file_get_contents($source),0,$ctx);
    }

    function simple_watermark($config_extra=array())
    {
        $imagesize=getimagesize($config_extra['source_image']);
        if($imagesize[0]>=500)
        {
            $wm=450;
        }
        elseif($imagesize[0]>=300)
        {
            $wm=250;
        }
        elseif($imagesize[0]>=150)
        {
            $wm=120;
        }
        elseif($imagesize[0]>=75)
        {
            $wm=75;
        }
        else
        {
            return true;
        }

        $config = array(
            'maintain_ration' => true,
            'wm_type'=>'overlay',
            'wm_overlay_path' =>storage_path('images/icon/wm_'.$wm.'.png'),
            'wm_opacity'=>50,
            'wm_hor_alignment'=>'center',
            'wm_vrt_alignment'=>'middle',
            'wm_hor_offset'=>'0',
            'wm_vrt_offset'=>'10',
        );
        $config=array_merge($config,$config_extra);

        $this->clear();
        $this->initialize($config);
        $this->watermark();
    }

    function resize_and_watermark($extra_config=array())
    {
        $config=array(
            'create_thumb'=>TRUE,
            'quality'=>'100%'
        );

        $config=array_merge($config,$extra_config);
        $real_config=$config;

        if(empty($real_config['sizes']))
        {
            $this->set_error('imglib_image_process_failed');
            return false;
        }

        rsort($real_config['sizes']);
        $config['thumb_marker']="_s".$real_config['sizes'][0];
        $this->clear();
        if(!$this->initialize($config))
        {
            return false;
        }

        if($this->orig_width <= $real_config['sizes'][0])
        {
            $this->width=$this->orig_width;
            $this->height=$this->orig_height;
        }
        else
        {
            $this->width=$real_config['sizes'][0];
            $this->height=$real_config['sizes'][0];
        }

        $this->image_reproportion();
        $resize_result=$this->resize();;
        $this->resize_and_watermark_data['first_size']=$this->full_dst_path;

        if($resize_result==TRUE && $real_config['do_watermark']==TRUE)
        {
            if($this->width >=800)
            {
                $wm=800;
            }
            elseif($this->width >=500)
            {
                $wm=450;
            }
            elseif($this->width >=300)
            {
                $wm=450;
            }
            elseif($this->width >=150)
            {
                $wm=120;
            }
            else
            {
                return true;
            }

            $wm_config=[
                'source_image'=>$this->full_dst_path,
                'wm_type'=>'overlay',
                'wm_opacity'=>100,
                'wm_hor_alignment'=>'right',
                'wm_vrt_alignment'=>'bottom',
                'wm_overlay_path'=>storage_path('/asset/images/icon/wm_'.$wm.'.png'),
            ];

            $this->clear();
            $this->initialize($wm_config);
            $this->watermark();
        }

        if(count($real_config['sizes'])>1)
        {
            unset($real_config['sizes'][0]);

            if(isset($real_config['resize_backend']) && $real_config['resize_backend']==TRUE)
            {
                $data=[
                    'sizes'=>serialize($real_config['sizes']),
                    'source_image'=>$this->full_dst_path,
                ];

                if(isset($real_config['delete_source']) && $real_config['delete_source']==TRUE)
                {

                    $data['delete_image']=$real_config['source_image'];

                }
//                die("sini");

//                $this->CI->load->helper('task');
//                add_task('/TASK/image_t/resize',$data);
            }
            else
            {
                if(isset($real_config['delete_source']) && $real_config['delete_source']==TRUE)
                {
                    $this->resize_and_watermark_data['delete_image']=$real_config['source_image'];
                }

                foreach($real_config['sizes'] as $sizes)
                {
                    $resize_wm_image=[
                        'source_image'=>$this->full_dst_path,
                        'width'=>$sizes,
                        'height'=>$sizes,
                        'new_image'=>preg_replace('/_s([\d]+)/',"_s$sizes",$this->full_dst_path),
                        'quality'=>'100'
                    ];
                    $this->clear();
                    $this->initialize($resize_wm_image);
                    $this->resize();
                    $this->full_dst_path=$resize_wm_image['new_image'];
                }
            }
            return true;
        }
        else
        {
            if(isset($real_config['delete_source']) && $real_config['delete_source']==TRUE)
            {
                $this->resize_and_watermark_data['delete_image']=$real_config['source_image'];
            }

            return true;
        }
        return false;
    }

    function resize_and_watermark_data()
    {
        return $this->resize_and_watermark_data;
    }
}