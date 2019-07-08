<!--
@Author : Ankit Savaliya
@Description : AMF Test
@CreateDate : 5th July 2019
@Notes : Bonus: French translation is seems wrong in excel sheet, it doesn't matches with google translate
@ This code just get company type, line of business and language and showing PDF accordingly, 
@ If french translation is correct then we can use google translate and search it in database and get both File 
@ as per selected company type
@ I also used PHPExcel library to fetch data from Excel but it take some time to load so used mysql database
@ In database, I have changed Description of Risk column name as companyType and E&O as EO beacause mysql not support & and space in table column name
-->

<!Doctype html>
<html>
    <head>
        <title> AMF Test - Ankit Savaliya </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script   src="https://code.jquery.com/jquery-3.4.1.min.js"   crossorigin="anonymous"></script>
        <script src="script.js"> </script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel='stylesheet' href='style.css' />
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <div class="row">    
            <h2>AMF Test</h2>

            <?php // include('phpExcelReader.php'); ?>
            <br/>
            <!-- Show Errors -->
            <h5 style='color:red;display:none;' id="showError"></h5> 
            
            
            <form class="form">
                <div class="form-group">
                <label class="col-sm-2 control-label"> Company Type </label>
                <div class="search">
                    <span class="glyphicon glyphicon-search "></span>
                    <input type='text' placeholder='Enter Company Type' list='companyType' id='searchCompanyType' />
                </div>
                <!-- Area to show company type when search  -->
                <ul id='companyType'>
                </ul>
                </div>
               
                <!-- Here option value is database table column name -->
                <div class="form-group">
                <label class="col-sm-2 control-label">Line of Business  </label>
                    <select id='lineOfBusiness'>
                        <option value='Liability'>Liability </option>
                        <option value='Property'> Property</option>
                        <option value="EO">E&O </option>
                        <option value='Excess'>Excess </option>
                        <option value='Umbrella'>Umbrella </option>
                    </select>
                </div>
                <div class="form-group">
                <label class="col-sm-2 control-label">select language </label><label class="checkbox-inline">  <input type="checkbox" id="english" /> English </label> <label class="checkbox-inline">  <input type="checkbox" id="french" /> French</label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Get Files</button>
                </div>
                
            </form>        
            <!-- Show loader -->
            <div class="loader" style="display:none;"></div>
            <!-- Showing PDF -->
            <ul id="showPDFs" style="display:none;">

            </ul> 
            </div>
    </div>
    </body>
</html>