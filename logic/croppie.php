<?php
    class croppie extends boiler{
        public function __construct(){
            parent::__construct();
        }

        public function defaultb(){
            $this->auth->form();
            if ($this->error == 0) {
                if (isset($_POST['image'])) {
                    $data = $_POST['image'];
                    $data = base64_decode($data);
                    $code = $this->form->post('code');
                    $prod = $this->db->query("SELECT * FROM products WHERE code = '$code' ");
                    if ($prod->num_rows > 0) {
                        $prod = $prod->fetch_assoc();
                        if (isset($prod['photo']) && file_exists("./".$prod['photo'])) {
                            unlink("./".$prod['photo']);
                        }
                        $imageName = "assets/products/".sha1(microtime()).'jpg';
                        $this->db->query("UPDATE products SET photo='$imageName' WHERE code = '$code'  ");
                        file_put_contents($imageName, $data);
                    }
                }
                
            }
        }

        public function user_photo(){
            $this->auth->form();
            if ($this->error == 0) {
                if (isset($_POST['image'])) {
                    $data = $_POST['image'];
                    $data = base64_decode($data);
                    $uid = $this->auth->uid;
                    if (isset($this->auth->photo) && file_exists("./".$this->auth->photo)) {
                        unlink("./".$this->auth->photo);
                    }
                    $imageName = "assets/uploads/".sha1(microtime()).'jpg';
                    $this->db->query("UPDATE users SET photo='$imageName' WHERE uid = '$uid' ");
                    file_put_contents($imageName, $data);
                }   
            }
        }
    }
    
?>