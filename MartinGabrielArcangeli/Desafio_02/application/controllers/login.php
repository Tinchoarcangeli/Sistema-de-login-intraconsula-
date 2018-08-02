<?php

		Class Login extends CI_Controller{


   		public function index(){
 

           $this->load->view('login_form');


		}

////////////////////////ESTE ES EL SISTEMA DE LOGIN QUE VA A VALIDAR LOS DATOS INGRESADOS////////////////////////////    

 public function do_login()
        {
         // carga la libreria form_validation
         $this->load->library('form_validation');

         $this->form_validation->set_rules('usuario', 'USUARIO', 'trim|required|min_length[5]');
         $this->form_validation->set_rules('contrasena', 'CONTRASEÑA', 'trim|required|min_length[5]');
         $this->form_validation->set_message('required', 'Por favor, complete el campo %s');   
         $this->form_validation->set_message('min_length', 'El usuario debe tener al menos 5 caracteres %s'); 
           // si hay errores
         if ($this->form_validation->run() == FALSE) { 
            // esto va a cargar mi pantalla login con los errores
        
               $this->load->view('login_form'); 

         } else {
           // si no hay errores va a acceder a la base de datos
            $user=$this->input->post('usuario', true);
            $pass=$this->input->post('contrasena', true);
            $login_variable = $this->m_login->proceso_login($user,$pass);



                if(null !== $login_variable)
                {

                  // $login_variable tiene la id del usuario
                 // se crea la sesion
                  $this->session->set_userdata(array('id' => $login_variable->id));



                  if($login_variable ->type == 0 && $login_variable ->status ==1)
                  {
                    // esto nos dirige a la pantalla del administrador 
                     redirect('login/admin');
                  }

                  else{


                        if($login_variable ->status == 1){


                          //esto nos dirige a la pantalla del usuario simple 
                             redirect('login/usuario');

                        }

                          //si el usuario/contraseña ingresados no corresponden a un usuario activo, lanza una alerta utilizando el metodo "flash"
                          else{ 
                      $this->session->set_flashdata('login_msg', 'USUARIO NO ACTIVO');
                       redirect('login/index');
                     }



                      }
                      //si no se encuentra el usuario/contraseña en la base de datos, lanza una alerta utilizando el metodo "flash"
                }else{
            $this->session->set_flashdata('login_msg', 'USUARIO O CONTRASEÑA INCORRECTA');
            redirect('login/index');
          }
        }
    }

//////////////////////////////////////////////////////////////////////////////////////////FIN DEL SISTEMA DE LOGIN!!!

////////////////////////FUNCIONES QUE VAN A MOSTRAR LAS DISTITNAS PAGINAS DEPENDIENDO DEL USUARIO////////////////////////////

            public function admin (){

                  $data['records']=$this->m_login->getDetalles();
                  $this->load->view('admin',$data);
                }


            public function usuario(){

                    $data['records']=$this->m_login->getDetalles();
                    $this->load->view('usuario',$data);
                }

            public function historial(){

                    $data['records']=$this->m_login->getDetalles();
                    $this->load->view('historial',$data);
                }

            public function info_user(){

                    $data['records']=$this->m_login->getINFO();
                    $this->load->view('info_user',$data);
                }

            public function info_user_simple(){

                    $data['records']=$this->m_login->getINFO();
                    $this->load->view('info_user_simple',$data);
            }

            public function info_usuarios(){

                    $data['records']=$this->m_login->getINFOUSER();
                    $this->load->view('info_usuario_alta',$data);
                }



             public function info_cursadas(){

                   $data['records']=$this->m_login->getDetalles2();
                   $this->load->view('info_cursada_crear',$data);
                }


             public function info_materias(){

                   $data['records']=$this->m_login->getMATERIAS();
                   $this->load->view('info_materia_crear',$data);


             }

             public function pagina_principal_admin(){

                  $this->load->view('admin');


             }

             public function pagina_principal_usuario(){

                  $this->load->view('usuario');

             }



			public function logout(){//esta funcion va a cerrar la sesion

				$this->session->sess_destroy();
				redirect('login/index');

			}


            public function home(){

                $data['records']=$this->m_login->getDetalles();
                $this->load->view('usuario',$data);
            }

/////////////////////////////////////////////////////////////////////////////////////////FIN FUNCIONES MOSTRAR!!!

////////////////////////FUNCIONES QUE VAN A EDITAR EL CONTENIDO DE LAS TABLAS////////////////////////////////
                public function editar($id){

          $data['usuarios'] = $this->m_login->get_usuarios();
          $data['record']=$this->m_login->get_id_fila($id);
          $this->load->view('editar',$data);

        }

                public function editar_cursada($ID){

          $data['materias'] = $this->m_login->get_materias();
          $data['usuarios'] = $this->m_login->get_usuarios();
          $data['record']=$this->m_login->get_id_fila_cursada($ID);
          $this->load->view('editar_cursada',$data);

        }



                public function editar_materia($id){


          $data['carreras'] = $this->m_login->get_carreras();
          $data['record']=$this->m_login->get_id_fila_materia($id);
          $this->load->view('editar_materia',$data);


        }
//////////////////////////////////////////////////////////////////////////////////////////FIN FUNCIONES EDITAR!!!

////////////////////////FUNCIONES QUE VAN A BORRAR EL CONTENIDO DE LAS TABLAS////////////////////////////////
               public function borrar($id){

          $this->db->where('id',$id);
          $this->db->delete('usuarios');

          redirect('login/info_usuarios');

        }


              public function borrar_cursada($ID){

          $this->db->where('ID',$ID);
          $this->db->delete('cursadas');

          redirect('login/info_cursadas');

        }


              public function borrar_materia($id){

          $this->db->where('id',$id);
          $this->db->delete('materias');

          redirect('login/info_materias');

        }

/////////////////////////////////////////////////////////////////////////////////////////FIN FUNCIONES BORRAR!!!

////////////////////////FUNCIONES QUE VAN A AGREGAR EL CONTENIDO DE LAS TABLAS////////////////////////////////

                  public function agregar(){

      $data['usuarios'] = $this->m_login->get_usuarios();

          $this->load->view('agregar', $data);

        }



                  public function agregar_cursada(){

          $data['materias'] = $this->m_login->get_materias();
          $data['usuarios'] = $this->m_login->get_usuarios();

          $this->load->view('agregar_cursada', $data);

        }



                  public function agregar_materia(){

          $data['carreras'] = $this->m_login->get_carreras();
          $this->load->view('agregar_materia', $data);


        }

/////////////////////////////////////////////////////////////////////////////////////////FIN FUNCIONES AGREGAR!!!

////////////////////////FUNCIONES QUE VAN A GUARDAR EL CONTENIDO DE LAS TABLAS////////////////////////////////
                public function save(){

            $txtcarr=$this->input->post("txtcarr");
            $txtmat=$this->input->post("txtmat");
            $txtdesc=$this->input->post("txtdesc");
            $txtcarga=password_hash($this->input->post("txtcarga"), PASSWORD_DEFAULT); 
            $txtipo=$this->input->post("txtipo");
            $txtestatus=$this->input->post("txtestatus");
            $txtcarga2=$this->input->post("txtcarga2");

          $this->m_login->save($txtcarr,$txtmat,$txtdesc,$txtcarga,$txtipo,$txtestatus,$txtcarga2);

          redirect('login/info_usuarios');

        }


              public function save_cursadas(){

            $txtcarr=$this->input->post("txtcarr");
            $txtmat=$this->input->post("txtmat");
            $txtdesc=$this->input->post("txtdesc");
            $txtcarga=$this->input->post("txtcarga");

            $this->m_login->save_cursadas($txtcarr,$txtmat,$txtdesc,$txtcarga);

            redirect('login/info_cursadas');

              }


              public function save_materias(){

            $txtcarr=$this->input->post("txtcarr");
            $txtmat=$this->input->post("txtmat");
            $txtdesc=$this->input->post("txtdesc");
            $txtcarga=$this->input->post("txtcarga");

          $this->m_login->save_materias($txtcarr,$txtmat,$txtdesc,$txtcarga);

          redirect('login/info_materias');



              }



                public function saveup(){
            $id=$this->input->post("txtid");   
            $txtcarr=$this->input->post("txtcarr");
            $txtmat=$this->input->post("txtmat");
            $txtdesc=$this->input->post("txtdesc");
            $txtcarga=password_hash($this->input->post("txtcarga"), PASSWORD_DEFAULT); 
            $txtipo=$this->input->post("txtipo");
            $txtestatus=$this->input->post("txtestatus");
            $txtcarga2=$this->input->post("txtcarga2");

          $this->m_login->saveup($txtcarr,$txtmat,$txtdesc,$txtcarga,$txtipo,$txtestatus,$txtcarga2,$id);

          redirect('login/info_usuarios');

}

                public function saveup_cursadas(){
              $id=$this->input->post("txtid");
              $txtcarr=$this->input->post("txtcarr");
              $txtmat=$this->input->post("txtmat");
              $txtdesc=$this->input->post("txtdesc");
              $txtcarga=$this->input->post("txtcarga");


            $this->m_login->saveup_cursadas($txtcarr,$txtmat,$txtdesc,$txtcarga,$id);

            redirect('login/info_cursadas');

}


                public function saveup_materias(){
            $id=$this->input->post("txtid");
            $txtcarr=$this->input->post("txtcarr");
            $txtmat=$this->input->post("txtmat");
            $txtdesc=$this->input->post("txtdesc");
            $txtcarga=$this->input->post("txtcarga");

          $this->m_login->saveup_materias($txtcarr,$txtmat,$txtdesc,$txtcarga, $id);

          redirect('login/info_materias');


}

/////////////////////////////////////////////////////////////////////////////////////////FIN FUNCIONES GUARDAR!!!

}
?>