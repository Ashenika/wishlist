var UserModel = Backbone.Model.extend({
    urlRoot : 'http://localhost/wishlist/index.php/AuthController/login',
    defaults : {
        username : '',
        password : ''
    }
});
var LoginView = Backbone.View.extend({
    initialize: function(){
        this.render();
    },
    render: function(){
        // var template = _.template( $("#login_template").html(), {} );
        // this.$el.html( template );
    },
    events: {
        "click button[id=login-btn]": "doLogin",
        "click button[id=logout-btn]": "doLogout"
    },
    doLogin: function( event ){
        if($("#lgn-username").val() !== "" && $("#lgn-password").val() !== "" ){
            var user = new UserModel();
            var self = this;
            user.fetch({
                data: $.param({email: $("#lgn-username").val(),password:$("#lgn-password").val()}),
                success: function (user) {
                    if(user.attributes.isValid){
                        alert('Login Successfull');
                        var template = _.template( $("#logged_template").html(),{} );
                        console.log(user);
                        self.$el.html( template );
                        $("#loginName").text(user.attributes.result.username);
                        sessionStorage.isloggedIn = true;
                        sessionStorage.username = user.attributes.result.username;
                        console.log("success");
                       // window.location.href = 'http://localhost/wishlistTest/index.php/ListModelController/index';
                       // window.location.href = "http://localhost/wishlistTest/index.php/UserModelController/main"
                       // router.navigate('http://localhost/wishlistTest/index.php/UserModelController/main', { trigger:true });
                    }else{
                        sessionStorage.isloggedIn = false;
                        console.log("invalid credentials");
                    }
                }
            })
        }else{
            console.log("Please fill the username and password");
        }
    },
    doLogout: function( event ){
        var self = this;
        $.post( "http://localhost/wishlistTest/index.php/AuthController/logout",function( data ) {
            sessionStorage.isloggedIn = "false"
            sessionStorage.username = "";
            var template = _.template( $("#login_template").html(), {} );
            self.$el.html( template );
            $(".btn-newpost").hide();
        });
    }
});
// load the view when page is loaded and set the view inside given containers
var login_view = new LoginView({ el: $("#login-container") });

var logged = new LoginView({ el: $("#logged_template") });
