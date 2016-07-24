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
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'password',
                                            'label' => '*密码',
                                            'rules' => 'required'
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
                                    
                                    




                    )                     
               );