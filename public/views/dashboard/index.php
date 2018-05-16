<?php
    require_once 'src/app/Mailer/Mailer.php';
    Mail::getConfig();
    $sender = Mail::getSender();
    $senderPw = Mail::getSenderPw();
    $reciever = Mail::getReciever();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
<!--            <li class="nav-item active">-->
<!--                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>-->
<!--            </li>-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $_SESSION['name']; ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" id="logoutLink" href="javascript:void(0)">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="card m50">
        <h4 class="card-header">Emails Configuration</h4>
        <form id="confEmailsForm" class="no-margin">
            <div class="card-block">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>Use this email as sender</label>
                            <input type="email" value="<?php echo Mail::getSender(); ?>" id="senderEmail" placeholder="Email" name="emailSender" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" value="<?php echo Mail::getSenderPw(); ?>" id="senderEmailPw" placeholder="Password" name="emailSenderPassword" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>Use this email as reciever</label>
                            <input type="email" value="<?php echo Mail::getReciever(); ?>" id="recieverEmail" placeholder="Email" name="emailReciever" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer cf">
                <button class="btn btn-primary">SAVE</button>
            </div>
        </form>
    </div>
</div>