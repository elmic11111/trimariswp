<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/elmic11111/trimariswp
 * @since      1.0.0
 *
 * @package    Trimariswp
 * @subpackage Trimariswp/admin/partials
 */
?>
<script type="text/javascript">
jQuery(document).ready(function($) {
  $('.custom_date').datepicker({
    dateFormat : 'yyyy-mm-dd'
  });
});
</script>


<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="container">
  <div class="card">
    <div class="card-header bg-primary text-white">Add new award to OP
      <button class="btn btn-info pull-right" id="first-ajax-button" style="margin-top:-7px;">First Ajax Request</button>
    </div>
    <div class="card-body">
      <form action="javascript:void(0)" id="frm-add-op-award">
        <div class="form-group">
          <label for="award">Award:</label>
          <input type="text" required class="form-control" placeholder="Award Code" name="award" id="award">
        </div>
        <div class="form-group">
          <label for="kingdomcode">Kingdom:</label>
          <select class="form-control" name="kingdomcode" id="kingdomcode">
            <option value="T">Trimaris</option>
            <option value="N">An Tir</option>
            <option value="X">Ansteorra</option>
            <option value="R">Artemisia</option>
            <option value="A">Atenveldt</option>
            <option value="Q">Atlantia</option>
            <option value="C">Caid</option>
            <option value="K">Calontir</option>
            <option value="D">Drachenwald</option>
            <option value="Y">Ealdormere</option>
            <option value="E">East</option>
            <option value="G">Gleann Abhann</option>
            <option value="L">Lochac</option>
            <option value="S">Meridies</option>
            <option value="M">Middle</option>
            <option value="Z">Mists</option>
            <option value="B">Northshield</option>
            <option value="O">Outlands</option>
            <option value="W">West</option>
            <option value="H">Æthelmearc</option>
          </select>
        </div>
        <div class="form-group">
          <label for="awardtype">Award Type:</label>
          <select class="form-control" name="awardtype" id="awardtype">
            <option value="K">K</option>
            <option value="B">B</option>
            <option value="P">P</option>
            <option value="S">S</option>
          </select>
        </div>
        <div class="form-group">
          <label for="awardlevel">Award Level:</label>
          <select class="form-control" name="awardlevel" id="awardlevel">
            <option value="A">Titled Nobility</option>
            <option value="B">Peers of the Realm</option>
            <option value="C">Heraldic Honors</option>
            <option value="D">Grant Level Armigerous</option>
            <option value="E">Kingdom Armigerous</option>
            <option value="F">Baronial Armigerous</option>
            <option value="G">Kingdom Non-Armigerous</option>
            <option value="H">Baronial Non-Armigerous</option>
            <option value="I">OutKingdom</option>
            <option value="J">Honorific</option>
          </select>
        </div>
        <div class="form-group">
          <label for="awardrank">Award Rank:</label>
          <input type="text" class="form-control" placeholder="# Value" name="awardrank" id="awardrank">
        </div>        
        <div class="form-group">
          <label for="awardopened">Award Open Date:</label>
          <input data-provide="datepicker"  data-date-format="yyyy-mm-dd" class="form-control" placeholder="yyyy-mm-dd" name="awardopened" id="awardopened">
        </div>    
        <div class="form-group form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="awardclosed" id="awardclosed" value="1"> Award Closed
          </label>
        </div>
        <div class="form-group">
          <label for="awardreason">Award Reason:</label>
          <input type="text" class="form-control" placeholder="Enter purpose of awared" name="awardreason" id="awardreason">
        </div>    
        <div class="form-group">
          <label for="awardname">Award Name:</label>
          <input type="text" class="form-control" placeholder="Award Name" name="awardname" id="awardname">
        </div>    
        <div class="form-group">
          <label for="awardcomment">Award Comment:</label>
          <input type="text" class="form-control" placeholder="Award Comment" name="awardcomment" id="awardcomment">
        </div>    
        <div class="form-group">
          <label for="awardorder">Order Award Belongs To:</label>
          <input type="text" class="form-control" placeholder="Award Order is it has one" name="awardorder" id="awardorder">
        </div>    
        <div class="form-group">
          <label for="awardimage">Award Image :</label>
          <input type="text" class="form-control" placeholder="URL parth for image" name="awardimage" id="awardimage">
        </div>    

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div> 
  </div>
</div>

<!--  id
  award
  kingdomcode
  awardtype
  awardlevel
  awardrank
  awardopened
  awardclosed
  awardreason
  awardname
  awardcomment
  awardorder
  awardimage -->
