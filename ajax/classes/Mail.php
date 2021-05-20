    <?php
    class Mail
    {
        private $mailer;

        public  function __construct($host,$username,$senha,$name)
        {
            $this->$mailer = new PHPMailer(true);

            $this->$mailer->isSMTP();
            $this->$mailer->Host       = $host;
            $this->$mailer->SMTPAuth   = true;
            $this->$mailer->Username   = $username;
            $this->$mailer->Password   = $senha;                               
            $this->$mailer->SMTPSecure = 'ssl';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $this->$mailer->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $this->$mailer->setFrom($username, $name);
                //Add a recipient
      

            //Content
            $this->$mailer->isHTML(true);                                  //Set email format to HTML
            

            
        }

        public function addAddress($email,$nome){
            $this->$mailer->addAddress('joe@example.net', 'Joe User'); 
        }

        public function formatarEmail($info){
            $this->$mailer->Subject = $info['assunto'];
            $this->$mailer->Body    = $info['corpo'];
            $this->$mailer->AltBody = strip_tags($info['corpo']);
        }
        public function enviarEmail(){
            if ($this->$mailer->send())
                return true;
            else
                return false;
        }
    }
?>