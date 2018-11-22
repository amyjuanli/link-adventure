<?php

$money = $this->session->userdata('money');
$money += $value;
$this->session->set_userdata('money', $money);

?>