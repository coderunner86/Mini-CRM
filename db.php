<?php

session_start();

$conn = mysqli_connect(
    'http://ec2-54-94-152-50.sa-east-1.compute.amazonaws.com/',
    'root',
    '123456',
    'icx_contacts'
);
