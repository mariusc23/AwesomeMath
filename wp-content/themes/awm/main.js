var MIN_FIELDLENGTH = 5;
var one_em = 14;
var EMAIL_PREFIX = 'titu';
var EMAIL_END = 'awesomemath.org';
jQuery(document).ready(function($) {
    var showing_message = 0; // 1 for error message, 2 for contact info
    var msg_timeout = 0;
    /* Init */
    function equal_max_height_em(a, b) {
        var h_a = $(a).height() * 1.0 / one_em
          , h_b = $(b).height() * 1.0 / one_em
        ;
        if (h_a > h_b) {
            $(b).css('height', h_a + 'em');
        }
        else {
            $(a).css('height', h_b + 'em');
        }
    }
    equal_max_height_em('#content', '#sidebar');

    /* End of init */
    function isValidEmailAddress(emailAddress) {
        var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        return pattern.test(emailAddress);
    }
    function validate_submission(field) {
        if (field) {
            var fields = [field];
        }
        else {
            var fields = ['name', 'email', 'message'];
        }
        var returnval = true;
        var text;
        for (var i in fields) {
            text = $('#contact_'+fields[i]).val();
            minlen = MIN_FIELDLENGTH;
            if (fields[i] == 'message') minlen *= 10;
            if ((text.length < minlen)
                || ((fields[i] == 'email') && !isValidEmailAddress($('#contact_'+fields[i]).val())))
            {
                $('#contact_'+fields[i]).attr('class', 'chighlight');
                returnval = false;
            }
            else {
                $('#contact_'+fields[i]).attr('class', '');
            }
        };
        return returnval;
    }
    $('#contact_name').keypress(function() {
        validate_submission('name');
    });
    $('#contact_email').keypress(function() {
        validate_submission('email');
    });
    $('#contact_message').keypress(function() {
        validate_submission('message');
    });

    $('#contact_form').submit(function () {
        if (validate_submission()) {
            var formInput = $(this).serialize();
            $.post('/wp-content/themes/awm/contact_form.php', formInput, function(data){
                $('#contact_form').hide();
                $('#contact_thanks').show();
            });
        }
        else if (showing_message != 1) {
            showing_message = 1;
            $('#contact_msgbox').html($('#contact_error').html());
            $('#contact_msgbox').addClass('error').removeClass('message').show();
            if (msg_timeout) clearTimeout(msg_timeout);
            msg_timeout = setTimeout(function(){ close_msgbox(); }, 10000);
        }
        return false;
    });

    $('#contact_form_info').click(function () {
        if (showing_message == 2) {
            close_msgbox();
            return false;
        }
        $('#contact_msgbox').html($('#contact_info').html());
        $('#contact_msgbox').removeClass('error').addClass('message').show();
        showing_message = 2;
        if (msg_timeout) clearTimeout(msg_timeout);
        msg_timeout = setTimeout(function(){ close_msgbox(); }, 10000);
        return false;
    });

    function close_msgbox() {
        $('#contact_msgbox').hide();
        showing_message = 0;
        return false;
    }
    
    function email_link() {
        window.location = "mailto:" + EMAIL_PREFIX + "@" + EMAIL_END;
        return false;
    }
    $('#contact_msgbox a:first-child').live('click', close_msgbox);
    $('#contact_email_addr').live('click', function() { return email_link();} );
    $('.contact_email_link').click(function() { return email_link(); });
});
