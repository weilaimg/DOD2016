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
                                            'field' => 'text',
                                            'label' => '内容',
                                            'rules' => 'required|max_length[5000]|min_length[50]'
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

                                    )                       
               );