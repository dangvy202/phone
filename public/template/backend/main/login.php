
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <?php echo $this->_metaHTTP;?>
	<?php echo $this->_metaName;?>
    <title><?php echo $this->_title;?></title>
    <?php echo $this->_cssFiles;?>
    <?php echo $this->_jsFiles;?>
</head>
<body class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href=""><b>Admin</b></a>
        </div>
        <?php 
            require_once MODULE_PATH. $this->_moduleName . DS . 'views' . DS . $this->_fileView . '.php';
        ?>
    </div>
    <!-- script -->
    <?php require_once 'html/script.php'; ?>
</body>
</html>