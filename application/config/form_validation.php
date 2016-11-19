<?php
$config=array(
        'signup' => array(
                array(
                        'field' => 'fname',
                        'label' => 'FirstName',
                        'rules' => 'trim|required|alpha|max_length[20]',
                        'errors'=>array(
                                'required'=>"%s harus diisi.",
                                'alpha'=>"%s hanya boleh alphabet",
                                'max_length'=>"Panjang %s maksimal 20 huruf"
                        )
                ),
                array(
                        'field' => 'lname',
                        'label' => 'LastName',
                        'rules' => 'trim|required|alpha|max_length[20]',
                        'errors'=>array(
                                'required'=>"%s harus diisi.",
                                'alpha'=>"%s hanya boleh alphabet",
                                'max_length'=>"Panjang %s maksimal 20 huruf"
                        )
                ),
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'trim|required',
                        'errors'=>array(
                                'required'=>"%s harus diisi."
                        )
                ),
                array(
                        'field' => 'rpassword',
                        'label' => 'Ulangi password',
                        'rules' => 'trim|required',
                        'errors'=>array(
                                'required'=>"%s harus diisi."
                        )
                ),
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'trim|required|valid_email|is_unique[sc_user.email]',
                        'errors'=>array(
                                'required'=>"%s harus diisi.",
                                'is_unique'=>'Email sudah terdaftar.',
                                'valid_email'=>'Format Email salah.'
                        )
                ),
                "error_prefix"=>"<div class='ci_form_val_error' style='color:blue;'>",
                "error_suffix"=>"</div>"
        )
);