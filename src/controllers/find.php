<?php
if(isset($_POST['search'])){
    header('Location: /ashion/src/pages/find.php?search='.$_POST['search']);
} else {
    header('Location: /ashion/src/pages/home.php');
}