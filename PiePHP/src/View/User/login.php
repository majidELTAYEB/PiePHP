<?php
    $link = 'http://localhost/PiePHP/src/view/User/login.php';
    $form = "<form action='http://localhost/PiePHP/User/connexion' method='post'>";
    $form .="<input type='email' name='email' placeholder='email'>";
    $form .="<input type='password' name='password' placeholder='password'>";
    $form .="<input type='submit' value='submit'>";
    $form .= "</form>";
    
    echo $form;
