<?php

/**
 * This command will check all new modules and add them to ACL access db
 * it also will check the "theaccessrule" function to assign default access on system
 *
 * @author saeed
 */
class HeisenbergCommand extends CConsoleCommand
{


    public function actionIndex()
    {
        print "Hello And Welcome To Heisenberg Command line \n";
        print "Here We Want U to Add SuperAdmin \n";
        print "..:Created By Aydin Abedinia:.. \n";
        print "First Step I want u to insert username for admin  \n";

        echo "\n\nPLz Insert Your Username :";
        $username = trim(fgets(STDIN));

        echo "\n\n";
        print "Second Step I want u to insert Password for admin  \n";

        echo "\n\nPLz Insert Your password :";
        $password = trim(fgets(STDIN));
        echo "\n\n";echo "\n\n";

        echo "Your Username is : ".$username;
        echo " & Your Password is : ".$password;

        echo "\n\n I create admin now ?";
        echo "\n\n y | n - type y or n : ";
        echo "\n\n";
        $bool = trim(fgets(STDIN));
        if($bool == 'y'){
            try {

                $time = time();
                $hashed = CPasswordHelper::hashPassword($password);

                Yii::app()->db->createCommand("INSERT INTO `user` (`email`, `username`, `password`,`created_time`)VALUES ('a@a.a', '$username', '$hashed',$time)")->execute();
                echo "super admin inserted | U can login with username & password";
            } catch (Exception $e) {
                echo "Plz Try Again Later...";
            }

        }else{
            echo "\n\n no \n\n";
        }

    }










}

?>