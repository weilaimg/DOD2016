<?php
$config = array(
                 'cate' => array(
                                    array(
                                            'field' => 'cate',
                                            'label' => '分类',
                                            'rules' => 'required|max_length[8]'
                                         )
                                    ),
                 'article' => array(
                                    array(
                                            'field' => 'title',
                                            'label' => '标题',
                                            'rules' => 'required|max_length[15]'
                                         ),
                                    array(
                                            'field' => 'info',
                                            'label' => '摘要',
                                            'rules' => 'required|max_length[40]'
                                         ),
                                    array(
                                            'field' => 'cid',
                                            'label' => '分类',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'aid',
                                            'label' => '',
                                            'rules' => ''
                                         ),
                                    array(
                                            'field' => 'text',
                                            'label' => '内容',
                                            'rules' => 'required|max_length[10000]|min_length[50]'
                                         )
                                    ) ,
                 'login'  => array(

                                    array(
                                            'field' => 'username',
                                            'label' => '*用户名',
                                            'rules' => 'alpha_dash|required|max_length[15]'
                                         ),
                                    array(
                                            'field' => 'captcha',
                                            'label' => '*验证码',
                                            'rules' => 'required|max_length[2]'
                                         ),
                                    array(
                                            'field' => 'password',
                                            'label' => '*密码',
                                            'rules' => 'required|alpha_dash|max_length[15]'
                                         )

                                    )  ,
                 'register'=>array(
                                    array(
                                            'field' => 'username',
                                            'label' => '用户名',
                                            'rules' => 'alpha_dash|required|max_length[15]'
                                        ),
                                    array(
                                            'field' => 'nickname',
                                            'label' => '昵称',
                                            'rules' => 'required|max_length[10]'
                                        ),
                                    array(
                                            'field' => 'password1',
                                            'label' => '密码',
                                            'rules' => 'required|alpha_dash|max_length[15]'
                                        ),
                                    array(
                                            'field' => 'password2',
                                            'label' => '二次输入密码',
                                            'rules' => 'required|matches[password1]'
                                        ),
                                    array(
                                            'field' => 'email',
                                            'label' => 'Email',
                                            'rules' => 'required|valid_emails'
                                        ),
                                    array(
                                            'field' => 'captcha',
                                            'label' => '*验证码',
                                            'rules' => 'required|max_length[2]'
                                         ),
                                    
                                     )      ,
                     'comment'=>array(
                                        array(
                                            'field' => 'comment',
                                            'label' => '评论',
                                            'rules' => 'required|min_length[8]'
                                        ),
                                        

                                    )   ,

                     'userinfo'=>array(
                                    array(
                                            'field' => 'username',
                                            'label' => '*用户名',
                                            'rules' => 'alpha_dash|required|max_length[15]'
                                        ),
                                    array(
                                            'field' => 'nickname',
                                            'label' => '*昵称',
                                            'rules' => 'required|max_length[10]'
                                        ),   
                                    array(
                                            'field' => 'email',
                                            'label' => '*Email',
                                            'rules' => 'required|valid_emails'
                                        )  
                                    ),
                     'passwd'=>array(
                                    array(
                                            'field' => 'old_passwd',
                                            'label' => '*旧密码',
                                            'rules' => 'required|alpha_dash|max_length[15]'
                                        ),
                                    array(
                                            'field' => 'new_passwd1',
                                            'label' => '*新密码',
                                            'rules' => 'required|alpha_dash|max_length[15]'
                                        ), 
                                    array(
                                            'field' => 'new_passwd2',
                                            'label' => '*二次输入密码',
                                            'rules' => 'required|matches[new_passwd1]'
                                        )
                                    )  
               );