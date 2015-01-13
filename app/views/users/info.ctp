<?php

echo $this->Form->button(
        'logout', array(
    'type' => 'button',
    'class' => 'btn btn-warning',
    'onclick' => "window.location.href = '" . Router::url(array('action' => 'logout')) . "';"
        )
);
echo "<br/>";
echo " name : " . $name . "<br/>";
echo " email : " . $email . "<br/>";
echo " token  : " . $token . "<br/>";
echo " type  : " . $type . "<br/>";
if (!empty($social_friends)) {
    echo " list friend " . "<br/>";
    pr($social_friends);
}
?>

