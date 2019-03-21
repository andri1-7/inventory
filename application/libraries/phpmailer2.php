<?php

require 'PHPMailer/PHPMailerAutoload.php';

class PHPMailer2 extends PHPMailer
{
    public  $config = null,
            $CI_object = null,
            $is_realsent = True,
            $debug = false;

    function __construct( $params = array() )
    {
        parent::__construct();

        require(APPPATH . 'config/email.php');

        $this->config = $config;

        log_message('debug', sprintf('%s (%s): %s', __FILE__, __LINE__, 'PHPMailer2 Class Initialized'));

        if ( isset( $params['CI_object']) )
            $this->CI_object = &$params['CI_object'];

        $this->initialized();
    }

    function initialized()
    {
        $this->isSMTP();

        $this->Host = $this->config['smtp_host'];
        $this->Port = $this->config['smtp_port'];
        $this->SMTPAuth = true;
        $this->SMTPSecure = $this->config['smtp_secure'];
        $this->Username = $this->config['smtp_user'];
        $this->Password = $this->config['smtp_pass'];
        $this->XMailer  = $this->config['xmailer'];

        if ( $this->config['mailtype'] == 'html')
            $this->isHTML(true);
    }

    function debug($status = null)
    {
        if ( is_null($status ) )
            $this->debug = !$this->debug;
        else
            $this->debug = $status;
    }

    function addFrom($from_email, $from_name = null)
    {
        $this->From = $from_email;

        if ( $from_name )
            $this->FromName = $from_name;
    }

    function subject($subject = 'No Subject')
    {
        $this->Subject = $subject;
    }

    function message($message = '')
    {
        $this->Body = $message;
    }

    function print_debugger()
    {
        $this->SMTPDebug = 2;
    }

    function send()
    {
        if ( $this->is_realsent )
        {
            $result = parent::send();
        }
        else if ( $this->debug === true )
        {
            error_log('Email is Sent');
            echo "From : ".$this->From."<br />\n" ;
            echo "From Name : ". $this->FromName."<br />\n" ;
            foreach( $this->all_recipients as $recipent => $val )
                echo "To : ". $recipent."<br />\n" ;
            echo "Subject : ". $this->Subject."<br />\n" ;
            echo "<br />\n" ;
            echo "Content <br />\n" ;
            echo $this->Body."<br />\n";
            $result = true;
        }
        else
        {
            $this->CI_object->db->save_queries = False;
            $backup_object = $this->CI_object;
            $this->CI_object = null;
//            var_dump( $this->CI_object->phpmailer2 ); die();
            $params = array(
                'subject' => $this->Subject,
                'recipent' => serialize( $this->to ),
                'obj_serialized' => serialize( $this ),
            );

            if ( !$backup_object->app_model->email_queue( $params ) )
            {
                $message = sprintf('Warning: Email sending, nothing to do!');
                error_log( sprintf('%s (%s) %s', __FILE__, __LINE__, $message));
                Misc::usrError( $message );
            }

            $this->CI_object = $backup_object;
            $result = true;
        }

        $this->clearAddresses();
        $this->clearCCs();
        $this->clearBCCs();
        $this->clearReplyTos();
        $this->clearAllRecipients();
        $this->clearAttachments();
        $this->From = '';
        $this->FromName = '';

        $this->initialized();
        return $result;
    }
}
