<?php // if ( ! defined('BASEPATH')) exit('No direct script access allowed');
///**
// * Created by PhpStorm.
// * User: riyan
// * Date: 10/26/2015
// * Time: 9:40 AM
// */
//class MY_Upload extends CI_Upload
//{
//    public $error_code;
//
//    function __construct()
//    {
//        parent::__construct();
//
//        $this->CI =& get_instance();
//    }
//
//    /**
//     * Set an error message
//     *
//     * @param	string	$msg
//     * @return	CI_Upload
//     */
//    public function set_error($msg, $log_level = 'error')
//    {
//        $this->_CI->lang->load('upload');
//
//        is_array($msg) OR $msg = array($msg);
//        foreach ($msg as $val)
//        {
//            $this->error_code[]=$val;
//            $msg = ($this->_CI->lang->line($val) === FALSE) ? $val : $this->_CI->lang->line($val);
//            $this->error_msg[] = $msg;
//            log_message($log_level, $msg);
//        }
//
//        return $this;
//    }
//
//
//    public function do_upload($field = 'userfile')
//    {
//        // Is $_FILES[$field] set? If not, no reason to continue.
//        if (isset($_FILES[$field]))
//        {
//            $_file = $_FILES[$field];
//        }
//        // Does the field name contain array notation?
//        elseif (($c = preg_match_all('/(?:^[^\[]+)|\[[^]]*\]/', $field, $matches)) > 1)
//        {
//            $_file = $_FILES;
//            for ($i = 0; $i < $c; $i++)
//            {
//                // We can't track numeric iterations, only full field names are accepted
//                if (($field = trim($matches[0][$i], '[]')) === '' OR ! isset($_file[$field]))
//                {
//                    $_file = NULL;
//                    break;
//                }
//
//                $_file = $_file[$field];
//            }
//        }
//
//        if ( ! isset($_file))
//        {
//            $this->set_error('upload_no_file_selected', 'debug');
//            return FALSE;
//        }
//
//        // Is the upload path valid?
//        if ( ! $this->validate_upload_path())
//        {
//            // errors will already be set by validate_upload_path() so just return FALSE
//            return FALSE;
//        }
//
//        // Was the file able to be uploaded? If not, determine the reason why.
//        if ( ! is_uploaded_file($_file['tmp_name']))
//        {
//            $error = isset($_file['error']) ? $_file['error'] : 4;
//
//            switch ($error)
//            {
//                case UPLOAD_ERR_INI_SIZE:
//                    $this->set_error('upload_file_exceeds_limit', 'info');
//                    break;
//                case UPLOAD_ERR_FORM_SIZE:
//                    $this->set_error('upload_file_exceeds_form_limit', 'info');
//                    break;
//                case UPLOAD_ERR_PARTIAL:
//                    $this->set_error('upload_file_partial', 'debug');
//                    break;
//                case UPLOAD_ERR_NO_FILE:
//                    $this->set_error('upload_no_file_selected', 'debug');
//                    break;
//                case UPLOAD_ERR_NO_TMP_DIR:
//                    $this->set_error('upload_no_temp_directory', 'error');
//                    break;
//                case UPLOAD_ERR_CANT_WRITE:
//                    $this->set_error('upload_unable_to_write_file', 'error');
//                    break;
//                case UPLOAD_ERR_EXTENSION:
//                    $this->set_error('upload_stopped_by_extension', 'debug');
//                    break;
//                default:
//                    $this->set_error('upload_no_file_selected', 'debug');
//                    break;
//            }
//
//            return FALSE;
//        }
//
//        // Set the uploaded data as class variables
//        $this->file_temp = $_file['tmp_name'];
//        $this->file_size = $_file['size'];
//
//        // Skip MIME type detection?
//        if ($this->detect_mime !== FALSE)
//        {
//            $this->_file_mime_type($_file);
//        }
//
//        $this->file_type = preg_replace('/^(.+?);.*$/', '\\1', $this->file_type);
//        $this->file_type = strtolower(trim(stripslashes($this->file_type), '"'));
//        $this->file_name = $this->_prep_filename($_file['name']);
//        $this->file_ext	 = $this->get_extension($this->file_name);
//        $this->client_name = $this->file_name;
//
//        // Is the file type allowed to be uploaded?
//        if ( ! $this->is_allowed_filetype())
//        {
//            $this->set_error('upload_invalid_filetype', 'debug');
//            return FALSE;
//        }
//
//        // if we're overriding, let's now make sure the new name and type is allowed
//        if ($this->_file_name_override !== '')
//        {
//            $this->file_name = $this->_prep_filename($this->_file_name_override);
//
//            // If no extension was provided in the file_name config item, use the uploaded one
//            if (strpos($this->_file_name_override, '.') === FALSE)
//            {
//                $this->file_name .= $this->file_ext;
//            }
//            else
//            {
//                // An extension was provided, let's have it!
//                $this->file_ext	= $this->get_extension($this->_file_name_override);
//            }
//
//            if ( ! $this->is_allowed_filetype(TRUE))
//            {
//                $this->set_error('upload_invalid_filetype', 'debug');
//                return FALSE;
//            }
//        }
//
//        // Convert the file size to kilobytes
//        if ($this->file_size > 0)
//        {
//            $this->file_size = round($this->file_size/1024, 2);
//        }
//
//        // Is the file size within the allowed maximum?
//        if ( ! $this->is_allowed_filesize())
//        {
//            $this->set_error('upload_invalid_filesize', 'info');
//            return FALSE;
//        }
//
//        // Are the image dimensions within the allowed size?
//        // Note: This can fail if the server has an open_basedir restriction.
//        if ( ! $this->is_allowed_dimensions())
//        {
//            $this->set_error('upload_invalid_dimensions', 'info');
//            return FALSE;
//        }
//
//        // Sanitize the file name for security
//        $this->file_name = $this->_CI->security->sanitize_filename($this->file_name);
//
//        // Truncate the file name if it's too long
//        if ($this->max_filename > 0)
//        {
//            $this->file_name = $this->limit_filename_length($this->file_name, $this->max_filename);
//        }
//
//        // Remove white spaces in the name
//        if ($this->remove_spaces === TRUE)
//        {
//            $this->file_name = preg_replace('/\s+/', '_', $this->file_name);
//        }
//
//        /*
//         * Validate the file name
//         * This function appends an number onto the end of
//         * the file if one with the same name already exists.
//         * If it returns false there was a problem.
//         */
//        $this->orig_name = $this->file_name;
//        if (FALSE === ($this->file_name = $this->set_filename($this->upload_path, $this->file_name)))
//        {
//            return FALSE;
//        }
//
//        /*
//         * Run the file through the XSS hacking filter
//         * This helps prevent malicious code from being
//         * embedded within a file. Scripts can easily
//         * be disguised as images or other file types.
//         */
//        if ($this->xss_clean && $this->do_xss_clean() === FALSE)
//        {
//            $this->set_error('upload_unable_to_write_file', 'error');
//            return FALSE;
//        }
//
//        /*
//         * Move the file to the final destination
//         * To deal with different server configurations
//         * we'll attempt to use copy() first. If that fails
//         * we'll use move_uploaded_file(). One of the two should
//         * reliably work in most environments
//         */
//        if ( ! @copy($this->file_temp, $this->upload_path.$this->file_name))
//        {
//            if ( ! @move_uploaded_file($this->file_temp, $this->upload_path.$this->file_name))
//            {
//                $this->set_error('upload_destination_error', 'error');
//                return FALSE;
//            }
//        }
//
//        /*
//         * Set the finalized image dimensions
//         * This sets the image width/height (assuming the
//         * file was an image). We use this information
//         * in the "data" function.
//         */
//        $this->set_image_properties($this->upload_path.$this->file_name);
//
//        if($this->is_image())
//        {
//            $this->fix_orientation($this->upload_path.$this->file_name);
//        }
//        return TRUE;
//    }
//
//    public function validate_upload_path()
//    {
//        if ($this->upload_path === '')
//        {
//            $this->set_error('upload_no_filepath', 'error');
//            return FALSE;
//        }
//
//        if (realpath($this->upload_path) !== FALSE)
//        {
//            $this->upload_path = str_replace('\\', '/', realpath($this->upload_path));
//        }
//
//        if (!file_exists($this->upload_path))
//        {
//            mkdir($this->upload_path, 0777, true);
//        }
//
//        if ( ! is_dir($this->upload_path))
//        {
//            $this->set_error('upload_no_filepath', 'error');
//            return FALSE;
//        }
//
//        if ( ! is_really_writable($this->upload_path))
//        {
//            $this->set_error('upload_not_writable', 'error');
//            return FALSE;
//        }
//
//        $this->upload_path = preg_replace('/(.+?)\/*$/', '\\1/',  $this->upload_path);
//        return TRUE;
//    }
//
//    function generate_name_token()
//    {
//        $this->CI->load->helper('string');
//        return random_string();
//    }
//
//    function fix_orientation($source)
//    {
//        if(ENVIRONMENT=='production' || ENVIRONMENT=='beta')
//        {
//            return $this->google_fix_orientation($source);
//        }
//        else
//        {
//            return $this->local_fix_orientation($source);
//        }
//    }
//
//    function local_fix_orientation($source)
//    {
//        $ext=pathinfo($source, PATHINFO_EXTENSION);
//        if(!in_array($ext,array('jpg','jpeg')))
//        {
//            return true;
//        }
//        @$exif = exif_read_data($source, 'IFD0');
//        if(isset($exif['Orientation']))
//        {
//            $ort = $exif['Orientation'];
//            switch($ort)
//            {
//                case 3:// 180 rotate left
//                    $rotate_config = array(
//                        'rotation_angle'=>180,
//                    );
//                    break;
//
//                case 6://90 rotate right
//                    $rotate_config = array(
//                        'rotation_angle'=>270,
//                    );
//                    break;
//
//                case 8://90 rotate left
//                    $rotate_config = array(
//                        'rotation_angle'=>90,
//                    );
//                    break;
//            }
//
//            if(isset($rotate_config))
//            {
//                $rotate_config['source_image'] = $source;
//                $this->CI->load->library('image_lib');
//
//                $this->CI->image_lib->clear();
//                $this->CI->image_lib->initialize($rotate_config);
//                $this->CI->image_lib->rotate();
//            }
//        }
//    }
//
//
//    function google_fix_orientation($file_full_path)
//    {
//        $path=(pathinfo($file_full_path));
//        $upload_data=array(
//            'file_name'=>$path['basename'],
//            'full_path'=>$file_full_path,
//            'file_path'=>$path['dirname'].'/',
//            'file_extension'=>$path['extension'],
//            'raw_name'=>$path['filename']
//        );
//
//        //function from rumah_helper.php
//        $image_url=storage_image_serving_url($file_full_path);
//
//        $file=getimagesize($image_url);
//        $options = array(
//            'gs' => array(
//                'Content-Type' => $file['mime'],
//                'Cache-Control' => 'public, max-age=604800, no-transform',
//            ),
//        );
//
//        $file_name=$upload_data['file_path'] . $upload_data['raw_name'] . "." . $upload_data['file_extension'];
//        $ctx = stream_context_create($options);
//        file_put_contents($file_name,file_get_contents($image_url),0,$ctx);
//    }
//}
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: riyan
 * Date: 10/26/2015
 * Time: 9:40 AM
 */
class MY_Upload extends CI_Upload
{
    public $error_code;

    function __construct()
    {
        parent::__construct();

        $this->CI =& get_instance();
    }

    /**
     * Set an error message
     *
     * @param	string	$msg
     * @return	CI_Upload
     */
//    public function set_error($msg, $log_level = 'error')
//    {
//        $this->_CI->lang->load('upload');
//
//        is_array($msg) OR $msg = array($msg);
//        foreach ($msg as $val)
//        {
//            $this->error_code[]=$val;
//            $msg = ($this->_CI->lang->line($val) === FALSE) ? $val : $this->_CI->lang->line($val);
//            $this->error_msg[] = $msg;
//            log_message($log_level, $msg);
//        }
//
//        return $this;
//    }


//    public function do_upload($field = 'userfile')
//    {
//        // Is $_FILES[$field] set? If not, no reason to continue.
//        if (isset($_FILES[$field]))
//        {
//            $_file = $_FILES[$field];
//        }
//        // Does the field name contain array notation?
//        elseif (($c = preg_match_all('/(?:^[^\[]+)|\[[^]]*\]/', $field, $matches)) > 1)
//        {
//            $_file = $_FILES;
//            for ($i = 0; $i < $c; $i++)
//            {
//                // We can't track numeric iterations, only full field names are accepted
//                if (($field = trim($matches[0][$i], '[]')) === '' OR ! isset($_file[$field]))
//                {
//                    $_file = NULL;
//                    break;
//                }
//
//                $_file = $_file[$field];
//            }
//        }
//
//        if ( ! isset($_file))
//        {
//            $this->set_error('upload_no_file_selected', 'debug');
//            return FALSE;
//        }
//
//        // Is the upload path valid?
//        if ( ! $this->validate_upload_path())
//        {
//            // errors will already be set by validate_upload_path() so just return FALSE
//            return FALSE;
//        }
//
//        // Was the file able to be uploaded? If not, determine the reason why.
//        if ( ! is_uploaded_file($_file['tmp_name']))
//        {
//            $error = isset($_file['error']) ? $_file['error'] : 4;
//
//            switch ($error)
//            {
//                case UPLOAD_ERR_INI_SIZE:
//                    $this->set_error('upload_file_exceeds_limit', 'info');
//                    break;
//                case UPLOAD_ERR_FORM_SIZE:
//                    $this->set_error('upload_file_exceeds_form_limit', 'info');
//                    break;
//                case UPLOAD_ERR_PARTIAL:
//                    $this->set_error('upload_file_partial', 'debug');
//                    break;
//                case UPLOAD_ERR_NO_FILE:
//                    $this->set_error('upload_no_file_selected', 'debug');
//                    break;
//                case UPLOAD_ERR_NO_TMP_DIR:
//                    $this->set_error('upload_no_temp_directory', 'error');
//                    break;
//                case UPLOAD_ERR_CANT_WRITE:
//                    $this->set_error('upload_unable_to_write_file', 'error');
//                    break;
//                case UPLOAD_ERR_EXTENSION:
//                    $this->set_error('upload_stopped_by_extension', 'debug');
//                    break;
//                default:
//                    $this->set_error('upload_no_file_selected', 'debug');
//                    break;
//            }
//
//            return FALSE;
//        }
//
//        // Set the uploaded data as class variables
//        $this->file_temp = $_file['tmp_name'];
//        $this->file_size = $_file['size'];
//
//        // Skip MIME type detection?
//        if ($this->detect_mime !== FALSE)
//        {
//            $this->_file_mime_type($_file);
//        }
//
//        $this->file_type = preg_replace('/^(.+?);.*$/', '\\1', $this->file_type);
//        $this->file_type = strtolower(trim(stripslashes($this->file_type), '"'));
//        $this->file_name = $this->_prep_filename($_file['name']);
//        $this->file_ext	 = $this->get_extension($this->file_name);
//        $this->client_name = $this->file_name;
//
//        // Is the file type allowed to be uploaded?
//        if ( ! $this->is_allowed_filetype())
//        {
//            $this->set_error('upload_invalid_filetype', 'debug');
//            return FALSE;
//        }
//
//        // if we're overriding, let's now make sure the new name and type is allowed
//        if ($this->_file_name_override !== '')
//        {
//            $this->file_name = $this->_prep_filename($this->_file_name_override);
//
//            // If no extension was provided in the file_name config item, use the uploaded one
//            if (strpos($this->_file_name_override, '.') === FALSE)
//            {
//                $this->file_name .= $this->file_ext;
//            }
//            else
//            {
//                // An extension was provided, let's have it!
//                $this->file_ext	= $this->get_extension($this->_file_name_override);
//            }
//
//            if ( ! $this->is_allowed_filetype(TRUE))
//            {
//                $this->set_error('upload_invalid_filetype', 'debug');
//                return FALSE;
//            }
//        }
//
//        // Convert the file size to kilobytes
//        if ($this->file_size > 0)
//        {
//            $this->file_size = round($this->file_size/1024, 2);
//        }
//
//        // Is the file size within the allowed maximum?
//        if ( ! $this->is_allowed_filesize())
//        {
//            $this->set_error('upload_invalid_filesize', 'info');
//            return FALSE;
//        }
//
//        // Are the image dimensions within the allowed size?
//        // Note: This can fail if the server has an open_basedir restriction.
//        if ( ! $this->is_allowed_dimensions())
//        {
//            $this->set_error('upload_invalid_dimensions', 'info');
//            return FALSE;
//        }
//
//        // Sanitize the file name for security
//        $this->file_name = $this->_CI->security->sanitize_filename($this->file_name);
//
//        // Truncate the file name if it's too long
//        if ($this->max_filename > 0)
//        {
//            $this->file_name = $this->limit_filename_length($this->file_name, $this->max_filename);
//        }
//
//        // Remove white spaces in the name
//        if ($this->remove_spaces === TRUE)
//        {
//            $this->file_name = preg_replace('/\s+/', '_', $this->file_name);
//        }
//
//        /*
//         * Validate the file name
//         * This function appends an number onto the end of
//         * the file if one with the same name already exists.
//         * If it returns false there was a problem.
//         */
//        $this->orig_name = $this->file_name;
//        if (FALSE === ($this->file_name = $this->set_filename($this->upload_path, $this->file_name)))
//        {
//            return FALSE;
//        }
//
//        /*
//         * Run the file through the XSS hacking filter
//         * This helps prevent malicious code from being
//         * embedded within a file. Scripts can easily
//         * be disguised as images or other file types.
//         */
//        if ($this->xss_clean && $this->do_xss_clean() === FALSE)
//        {
//            $this->set_error('upload_unable_to_write_file', 'error');
//            return FALSE;
//        }
//
//        /*
//         * Move the file to the final destination
//         * To deal with different server configurations
//         * we'll attempt to use copy() first. If that fails
//         * we'll use move_uploaded_file(). One of the two should
//         * reliably work in most environments
//         */
//        if ( ! @copy($this->file_temp, $this->upload_path.$this->file_name))
//        {
//            if ( ! @move_uploaded_file($this->file_temp, $this->upload_path.$this->file_name))
//            {
//                $this->set_error('upload_destination_error', 'error');
//                return FALSE;
//            }
//        }
//
//        /*
//         * Set the finalized image dimensions
//         * This sets the image width/height (assuming the
//         * file was an image). We use this information
//         * in the "data" function.
//         */
//        $this->set_image_properties($this->upload_path.$this->file_name);
//
//        if($this->is_image())
//        {
//            $this->fix_orientation($this->upload_path.$this->file_name);
//        }
//        return TRUE;
//    }

    public function validate_upload_path()
    {
        if ($this->upload_path === '')
        {
            $this->set_error('upload_no_filepath', 'error');
            return FALSE;
        }

        if (realpath($this->upload_path) !== FALSE)
        {
            $this->upload_path = str_replace('\\', '/', realpath($this->upload_path));
        }

        if (!file_exists($this->upload_path))
        {
            mkdir($this->upload_path, 0777, true);
        }

        if ( ! is_dir($this->upload_path))
        {
            $this->set_error('upload_no_filepath', 'error');
            return FALSE;
        }

        if ( ! is_really_writable($this->upload_path))
        {
            $this->set_error('upload_not_writable', 'error');
            return FALSE;
        }

        $this->upload_path = preg_replace('/(.+?)\/*$/', '\\1/',  $this->upload_path);
        return TRUE;
    }

    function generate_name_token()
    {
        $this->CI->load->helper('string');
        return random_string();
    }

//    function fix_orientation($source)
//    {
//        if(ENVIRONMENT=='production' || ENVIRONMENT=='beta')
//        {
//            return $this->google_fix_orientation($source);
//        }
//        else
//        {
//            return $this->local_fix_orientation($source);
//        }
//    }


//    function local_fix_orientation($source)
//    {
//        $ext=pathinfo($source, PATHINFO_EXTENSION);
//        if(!in_array($ext,array('jpg','jpeg')))
//        {
//            return true;
//        }
//        @$exif = exif_read_data($source, 'IFD0');
//        if(isset($exif['Orientation']))
//        {
//            $ort = $exif['Orientation'];
//            switch($ort)
//            {
//                case 3:// 180 rotate left
//                    $rotate_config = array(
//                        'rotation_angle'=>180,
//                    );
//                    break;
//
//                case 6://90 rotate right
//                    $rotate_config = array(
//                        'rotation_angle'=>270,
//                    );
//                    break;
//
//                case 8://90 rotate left
//                    $rotate_config = array(
//                        'rotation_angle'=>90,
//                    );
//                    break;
//            }
//
//            if(isset($rotate_config))
//            {
//                $rotate_config['source_image'] = $source;
//                $this->CI->load->library('image_lib');
//
//                $this->CI->image_lib->clear();
//                $this->CI->image_lib->initialize($rotate_config);
//                $this->CI->image_lib->rotate();
//            }
//        }
//    }
//
//    function google_fix_orientation($file_full_path)
//    {
//        $path=(pathinfo($file_full_path));
//        $upload_data=array(
//            'file_name'=>$path['basename'],
//            'full_path'=>$file_full_path,
//            'file_path'=>$path['dirname'].'/',
//            'file_extension'=>$path['extension'],
//            'raw_name'=>$path['filename']
//        );
//
//        //function from rumah_helper.php
//        $image_url=storage_image_serving_url($file_full_path);
//
//        $file=getimagesize($image_url);
//        $options = array(
//            'gs' => array(
//                'Content-Type' => $file['mime'],
//                'Cache-Control' => 'public, max-age=604800, no-transform',
//            ),
//        );
//
//        $file_name=$upload_data['file_path'] . $upload_data['raw_name'] . "." . $upload_data['file_extension'];
//        $ctx = stream_context_create($options);
//        file_put_contents($file_name,file_get_contents($image_url),0,$ctx);
//    }
}