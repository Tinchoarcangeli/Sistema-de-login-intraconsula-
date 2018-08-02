<?php

		class m_login extends CI_Model{

                public function proceso_login($user,$pass){
                    $this->db->where('username', $user);
                     $user = $this->db->get('usuarios')->row();
                     if ($user && password_verify($pass, $user->password)) {
                    return $user;
                }
             return null;
            }



			public function getDetalles()
				{
                   $resultado = $this->db->select('cursadas.date as date, cursadas.grade as grade, usuarios.username as user, materias.name as subject')->from('cursadas')
                    ->join('usuarios','usuarios.id=cursadas.user_id')
                    ->join('materias','materias.id=cursadas.subject_id')
                    ->where('cursadas.user_id=',$this->session->userdata('id'))
                    ->get()->result_array();
                return $resultado; 
				}


             public function getDetalles2()
                {
                   $query_detalle = $this->db->query('SELECT a.id ID,b.username User, c.name, a.grade, a.date from cursadas a JOIN usuarios b ON a.user_id=b.id join materias c ON c.id=a.subject_id');

                        $resultado = $query_detalle->result_array();
                        return $resultado;
                }



             public function getMATERIAS()
                {

                $this->db->SELECT('s.*, c.name AS carrera')
                     ->FROM('materias s')
                     ->JOIN('carreras c', 's.career_id = c.id', 'left');

            $query = $this->db->get();

            if($query -> num_rows() > 0){

                return $query->result();
            }

            return false;

                }


    public function getINFO(){

    $query = $this->db->get_where('usuarios', array('id' => $this->session->userdata('id')));
    if ($query->num_rows() > 0 ) {
        return $query->row_array();
    }
}


    public function getINFOUSER(){

    $query = $this->db->get_where('usuarios',array('type'=>1));
    if ($query->num_rows() > 0 ) {
        $resultado = $query->result_array();
    }

    return $resultado; 

}


    public function get_usuarios() {
   $this->db->select('id, username')
        ->from('usuarios')
        ->where(array('status'=>1, 'type'=>1));

   $q = $this->db->get();
   return $q->result();
}


    
    public function get_carreras(){

    $this->db->select('c.*')
             ->from('carreras c');

       $q = $this->db->get();

          return $q->result();

}


        public function save($txtcarr,$txtmat,$txtdesc,$txtcarga,$txtipo,$txtestatus,$txtcarga2){

          $data=array(
            'username'=>$txtcarr,
            'name'=>$txtmat,
            'lastname'=>$txtdesc,
            'password'=>$txtcarga,
            'type'=>$txtipo,
            'status'=>$txtestatus,
            'date'=>$txtcarga2

        );

          $this->db->insert('usuarios', $data);

    }


        public function save_cursadas($txtcarr,$txtmat,$txtdesc,$txtcarga){

          $data=array(
            'user_id'=>$txtcarr,
            'subject_id'=>$txtmat,
            'grade'=>$txtdesc,
            'date'=>$txtcarga

        );

          $this->db->insert('cursadas', $data);

    }



        public function save_materias($txtcarr, $txtmat, $txtdesc, $txtcarga){

          $data=array(
            'career_id'=>$txtcarr,
            'name'=>$txtmat,
            'description'=>$txtdesc,
            'hours'=>$txtcarga

        );

          $this->db->insert('materias', $data);

        }



        public function saveup($txtcarr,$txtmat,$txtdesc,$txtcarga,$txtipo,$txtestatus,$txtcarga2,$id){

          $data=array(
            'username'=>$txtcarr,
            'name'=>$txtmat,
            'lastname'=>$txtdesc,
            'password'=>$txtcarga,
            'type'=>$txtipo,
            'status'=>$txtestatus,
            'date'=>$txtcarga2

        );

          $this->db->where("id", $id);
          $this->db->update('usuarios', $data);

    }



        public function saveup_cursadas($txtcarr,$txtmat,$txtdesc,$txtcarga,$id){

          $data=array(
            'user_id'=>$txtcarr,
            'subject_id'=>$txtmat,
            'grade'=>$txtdesc,
            'date'=>$txtcarga
        );

          $this->db->where("id", $id);
          $this->db->update('cursadas', $data);

    }


        public function saveup_materias($txtcarr, $txtmat, $txtdesc, $txtcarga, $id){

          $data=array(
            'career_id'=>$txtcarr,
            'name'=>$txtmat,
            'description'=>$txtdesc,
            'hours'=>$txtcarga

        );
            $this->db->where("id", $id);
            $this->db->update('materias', $data);

    }


              public function get_materias() {
         $this->db->select('c.*')
             ->from('materias c');

       $q = $this->db->get();

          return $q->result();
}



        public function get_id_fila($id){
            $query = $this->db->get_where('usuarios', array('id' => $id));
            return $query->row();
          }


        public function get_id_fila_cursada($ID){
            $query = $this->db->get_where('cursadas', array('ID' => $ID));
            return $query->row();
          }



        public function get_id_fila_materia($id){
            $query = $this->db->get_where('materias', array('id' => $id));
            return $query->row();
        }

}
?>