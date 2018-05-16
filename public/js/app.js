(function(){
    window.app = {
        path: document.location.href,
        init: function(){
            this.cacheDom();
            this.actions.init();
            this.listeners.init();
        },
        cacheDom: function(){
            $loginForm = $('#loginForm');
            $logoutLink = $('#logoutLink');
            $confEmailsForm = $('#confEmailsForm');
        },
        listeners: {
            init: function(){
                this.loginFormSubmitListener();
                this.logoutLinkClickListener();
                this.configureEmailsFormSubmitListener();
            },
            loginFormSubmitListener: function(){
                self.$loginForm.on('submit', function(e){
                    app.handlers.loginFormSubmitHandler(e);
                });
            },
            logoutLinkClickListener: function(){
                self.$logoutLink.on('click',function(){
                    app.handlers.logoutLinkClickHandler();
                });
            },
            configureEmailsFormSubmitListener: function(){
                self.$confEmailsForm.on('submit', function(e){
                    app.handlers.configureEmailsFormSubmitHandler(e);
                });
            }
        },
        handlers: {
            loginFormSubmitHandler: function(e){
                e.preventDefault();
                var email = self.$loginForm.find('#email').val();
                var password = self.$loginForm.find('#password').val();
                $.ajax({
                    url:'loginRoute',
                    type:'POST',
                    data: {
                        email: email,
                        password: password
                    },
                    success:function(data){
                        if(data == 200){
                            window.location.reload();
                        }else{
                            self.$loginForm.find('.error').text('Wrong email/password');
                        }
                    },
                    error: function(a,b){
                        window.location.reload();

                    }
                });
            },
            logoutLinkClickHandler: function(){
                $.ajax({
                    url:'logout',
                    type:'GET',
                    success:function(data){
                        window.location.reload();
                    },
                    error: function(a,b){
                        window.location.reload();
                    }
                });
            },
            configureEmailsFormSubmitHandler: function(e){
                e.preventDefault();
                var sender = self.$confEmailsForm.find('#senderEmail').val();
                var senderPw = self.$confEmailsForm.find('#senderEmailPw').val();
                var reciever = self.$confEmailsForm.find('#recieverEmail').val();

                $.ajax({
                    url:'configure-emails',
                    type:'POST',
                    data:{
                        emailSender: sender,
                        emailSenderPassword: senderPw,
                        emailReciever: reciever
                    },
                    success:function(){
                        window.location.reload();
                    },
                    error: function(a,b){
                        window.location.reload();
                    }
                });
            }
        },
        actions: {
            init: function(){
                // this.tokenExists();
            },
            tokenExists: function(){
                if(app.path.includes('reset')){
                    var token = app.path.substr(app.path.lastIndexOf('/') + 1);
                    if(token.length > 0){
                        return true;
                    }
                }
                return false;
            }
        }
    };
    var app = window.app;
    document.addEventListener('DOMContentLoaded', function(){
        app.init();
    })
})();