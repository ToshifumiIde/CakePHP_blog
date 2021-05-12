<?php
echo $this->Form->create("User");
echo $this->Form->input("User.username");
echo $this->From->input("User.password");
echo $this->From->end("Login");
?>