<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Model pendaftaran NLC
 */


/*
 * 1 = pengumpulan, jika sudah = 7
 * 2 = penilaian huruf, jika sudah = 8
 * 3 = penilaian angka, jika sudah = 9
 */

class kriteria_seleksi_model extends CI_Model{
    private  $table_kriteriaseleksi;
    
    public function __construct() {
        parent::__construct();
        $this->table_kriteriaseleksi    =   'kriteriaseleksi';
        
    }
    
  
    function add_kriteriaseleksi($data){
        $this->db->insert($this->table_kriteriaseleksi, $data);
        if($this->db->affected_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    function select_kriteriaseleksi()
    {
        $this->db->where('trash','n');
        $SQL    =   $this->db->get($this->table_kriteriaseleksi);
        if($SQL->num_rows() > 0)
        {
            foreach ($SQL->result() as $row) {
                $data[] =   $row;
            }
            return $data;
        }
        else
        {
            return null;
        }
    }
    
    function update_kriteriaseleksi($id_kriteriaseleksi, $data)
    {
        $this->db->where('id_kriteria_seleksi', $id_kriteriaseleksi);
        $this->db->update($this->table_kriteriaseleksi, $data);
        if($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }
    
    
    function delete_kriteriaseleksi($id_kriteriaseleksi)
    {
        $this->db->where('id_kriteria_seleksi', $id_kriteriaseleksi);
        $this->db->delete($this->table_kriteriaseleksi);
        if($this->db->affected_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }      
    
    function select_kriteriaseleksi_seleksi($id_seleksi)
    {
        $this->db->where('trash','n');
        $this->db->where('id_seleksi',$id_seleksi);
        $SQL    =   $this->db->get($this->table_kriteriaseleksi);
        if($SQL->num_rows() > 0)
        {
            foreach ($SQL->result() as $row) {
                $data[] =   $row;
            }
            return $data;
        }
        else
        {
            return null;
        }
    }
    
    
    function select_kriteriaseleksi_new($id_seleksi)
    {
        $SQL = "select * from kriteriaseleksi ks, kriteria k where id_seleksi = $id_seleksi and ks.id_kriteria = k.id_kriteria and trash = 'n'";
        $query = $this->db->query($SQL);
        if($this->db->affected_rows() == 1)
        if($SQL->num_rows() > 0)
        {
            foreach ($SQL->result() as $row) {
                $data[] =   $row;
            }
            return $data;
        }
        else
        {
            return null;
        }
    }  
    
    function get_kriteriaseleksi($id_kriteriaseleksi)
    {
        $SQL = "select * from kriteriaseleksi where id_kriteria_seleksi = ? and trash = 'n'";
        $query = $this->db->query($SQL, $id_kriteriaseleksi);
        if($this->db->affected_rows() == 1)
        {
            foreach($query->result() as $row)
            {
                return $row;    
            }
        }
        else
        {
            return null;
        }
    }   
    
    function select_kriteriaseleksi_peserta($id_tes)
    {
        $SQL = "select * from kriteriaseleksi s, peserta p where p.id_peserta = s.id_peserta and  s.id_tes = $id_tes and p.trash = 'n' and s.trash = 'n'";
        $query = $this->db->query($SQL);
        if($this->db->affected_rows() > 0)
        {
            foreach ($query->result() as $row) 
            {
                $data[] =   $row;
            }
            return $data;
        }
        else
        {
            return null;
        }
    }
    
    function get_kriteriaseleksi_afterinsert($timestamp, $zakat, $no_rekening)
    {
        $SQL = "select * from kriteriaseleksi where  zakat = $zakat and no_rekening = '$no_rekening' and timestamp = ? and trash = 'n'";
        $query = $this->db->query($SQL, $timestamp);
        if($this->db->affected_rows() == 1)
        {
            foreach($query->result() as $row)
            {
                return $row;    
            }
        }
        else
        {
            return null;
        }
    }   
    
    
    
}

?>
