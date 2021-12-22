
<h5>1 review for <span>Chaz Kangeroo</span></h5>
    
    <div class="form-group row">
        <div class="col">
            <label class="col-form-label"><span class="text-danger">*</span>
                Your Review</label>
            <textarea class="form-control" required></textarea>
            <div class="help-block pt-10"><span class="text-danger">Note:</span>
                HTML is not translated!
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col">
            <label class="col-form-label"><span class="text-danger">*</span>
                Rating</label>
            &nbsp;&nbsp;&nbsp; Bad&nbsp;
            <input type="radio" value="1" name="rating">
            &nbsp;
            <input type="radio" value="2" name="rating">
            &nbsp;
            <input type="radio" value="3" name="rating">
            &nbsp;
            <input type="radio" value="4" name="rating">
            &nbsp;
            <input type="radio" value="5" name="rating" checked>
            &nbsp;Good
        </div>
    </div>
    <div class="buttons">
    <?php
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
            echo '<button class="btn btn-sqr disable" type="button">Please login to review</button>';
        }else {
         echo '<button class="btn btn-sqr" type="submit">Continue</button>';
        }



        
    ?>    
   
        
    </div> 