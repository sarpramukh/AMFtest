$(document).ready(function(){

// Function to get company type when do search
$('#searchCompanyType').keyup(function(){
    // Get search word
    var txt = $(this).val();
    //console.log(txt);
    var data = new FormData();
    data.append('search',txt);
    // empty companytype area clean
    $('#companyType').html('');
    if(txt != ''){
        $.ajax({
            
                type: "POST",
                url: "getCompanyType.php",
                data: data,
                cache:false,
                async: false,
                processData: false,
                contentType: false,
                success: function(res){
                    //console.log(res);
                    // Show comapny type in area
                    $('#companyType').html(res);
                    // Adding css to company type list
                    $('#companyType li').mouseover(function(){
                        $(this).addClass('active');
                    }).mouseout(function(){
                        $(this).removeClass('active');
                    });
                    $('#companyType li').click(function(){
                        var txt = $(this).text();
                        //console.log(txt);
                        $('#companyType').html('');
                        $('#searchCompanyType').val(txt);
                    });
                }  
        });
    }else{
        $('#searchCompanyType').val('');
    }
});

   //When submit form ( click on Get Files button )
      $('form').submit(function(){
        event.preventDefault(); // This will prevent default javascript events
        $("#showPDFs").text(''); // Keep showPDF area clean
        var companyType = $('#searchCompanyType').val(); // Get company type
        if(companyType != '' && companyType != null){ // Check company type is null or empty
            var lineOfBusiness = $('#lineOfBusiness').val(); // Get line of business
            var english = $('#english').prop('checked'); // check if english checkbox is checked or not
            var french = $('#french').prop('checked'); // check if french checkbox is checked or not
            $("#showError").hide(); // Hide error if any 
            if(english == false && french == false){ // if both languages are not checked then show errors
                $("#showError").show();
                $("#showError").text('Please select language');
            }else{
                    if(english == true){english='E';}
                    if(french == true){french='F';}
                    /* console.log('companyType : '+companyType);
                    console.log('lineOfBusiness : '+lineOfBusiness);
                    console.log('english : '+english);
                    console.log('french : '+french);  */
                    var data = new FormData();
                    data.append('companyType',companyType);
                    data.append('lineOfBusiness',lineOfBusiness);
                    data.append('english',english);
                    data.append('french',french);
                
                $(".loader").show(); // Show loader
                    
                // send data to getPDF.php and get PDFs in result
                $.ajax({
                        type: "POST",
                        url: "getPDF.php",
                        data: data,
                        cache:false,
                        async: false,
                        processData: false,
                        contentType: false,
                        success: function(msg){
                            $(".loader").hide();
                            $('#showPDFs').show();
                            // Showing PDFs in browser 
                           var res = JSON.parse(msg);
                           console.log(res);
                           
                            if(res.length < 1){
                                $("#showPDFs").text('NO PDF AVAILABLE');                       
                            }else{
                                var i = 0; // used to check if all value coming from table is empty or not
                                    
                                res.forEach(p => {
                                    if(p === "" ){ // if there is no value then increse i
                                        i++;
                                    }else{ 
                                        $("#showPDFs").append("<li><a href='/apps/"+p+"' target='_blank'>"+p+" </a></li>");
                                    }
                                });
                                //console.log('i = '+i+" res.length = "+res.length);
                                // Check if i and result length is same and i > 0
                                if(i > 0 && i == res.length){
                                    $("#showPDFs").text('NO PDF AVAILABLE'); 
                                }
                                //$("#showPDFs").html(pdf);
                                $('#showPDFs li a').mouseover(function(){
                                    $(this).addClass('pdfSelect');
                                }).mouseout(function(){
                                    $(this).removeClass('pdfSelect');
                                });
                            }
                            
                        }
                });
            }   
        }else{ // show error if company type not selected
            $("#showError").show();
            $("#showError").text('Please select Company Type');
        } 
    });

});

