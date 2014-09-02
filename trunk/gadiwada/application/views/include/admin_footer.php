 </div>
            </div>   
                    </div>
                    <!--End Datatables-->

                    <hr>
                                                </div>
                    <!-- /.row-fluid -->
                </div>
                <!-- /.inner -->
            </div>
            <!-- /.row-fluid -->
        </div>
        <!-- /.outer -->
    </div>
    <!-- /#content -->
    <!-- #push do not remove -->
    <div id="push"></div>
    <!-- /#push -->
</div>
<!-- /#wrap -->
<div id="footer">
    
</div>


        <!-- #editModal -->
        <div id="editModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
             aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="editModalLabel"><i class="icon-edit"></i> Edit Table</h3>
            </div>
            <div class="modal-body">
                <div class="control-group">
                    <label for="fName" class="control-label">First Name</label>
                    <div class="controls">
                        <input type="text" id="fName" name="fName">
                    </div>
                </div>
                <div class="control-group">
                    <label for="lName" class="control-label">Last Name</label>
                    <div class="controls">
                        <input type="text" id="lName" name="lName">
                    </div>
                </div>
                <div class="control-group">
                    <label for="uName" class="control-label">Username</label>
                    <div class="controls">
                        <input type="text" id="uName" name="uName">
                    </div>
                </div>
                <div class="form-actions">
                    <button id="sbmtBtn" type="submit" class="btn btn-primary" data-dismiss="modal" >Submit</button>
                </div>
            </div>
            <div class="modal-footer">

                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
        <!-- /#editModal -->

        <!-- #helpModal -->
        <div id="helpModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel"
             aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="helpModalLabel"><i class="icon-external-link"></i> Help</h3>
            </div>
            <div class="modal-body">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                    ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                    nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                    anim id est laborum.
                </p>
            </div>
            <div class="modal-footer">

                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
        <!-- /#helpModal -->
        <!-- #colorModal -->
        <div id="colorModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="colorModalLabel"
             aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="colorModalLabel"><i class="icon-cog"></i> Choose Style</h3>
            </div>
            <div class="modal-body">
                <p class="color-switcher">
                    <a href="javascript:void(0)" class="btn btn-large" rel="default"><i class="icon-magic"></i></a>
                    <a href="javascript:void(0)" class="btn btn-large btn-bizstrap-1" rel="color1"><i class="icon-magic"></i></a>
                    <a href="javascript:void(0)" class="btn btn-large btn-bizstrap-2" rel="color2"><i class="icon-magic"></i></a>
                    <a href="javascript:void(0)" class="btn btn-large btn-bizstrap-3" rel="color3"><i class="icon-magic"></i></a>
                    <a href="javascript:void(0)" class="btn btn-large btn-bizstrap-4" rel="color4"><i class="icon-magic"></i></a>
                    <a href="javascript:void(0)" class="btn btn-large btn-bizstrap-5" rel="color5"><i class="icon-magic"></i></a>
                    <a href="javascript:void(0)" class="btn btn-large btn-bizstrap-6" rel="color6"><i class="icon-magic"></i></a>
                </p>
                <hr>
                <p class="pattern-switcher">
                    <a href="javascript:void(0)" class="p1" title="pattern 1"></a>
                    <a href="javascript:void(0)" class="p2" title="pattern 2"></a>
                    <a href="javascript:void(0)" class="p3" title="pattern 3"></a>
                    <a href="javascript:void(0)" class="p4" title="pattern 4"></a>
                    <a href="javascript:void(0)" class="p5" title="pattern 5"></a>
                    <a href="javascript:void(0)" class="p6" title="pattern 6"></a>
                    <a href="javascript:void(0)" class="p7" title="pattern 7"></a>
                    <a href="javascript:void(0)" class="p8" title="pattern 8"></a>
                    <a href="javascript:void(0)" class="p9" title="pattern 9"></a>
                    <a href="javascript:void(0)" class="p10" title="pattern 10"></a>
                    <a href="javascript:void(0)" class="p11" title="pattern 11"></a>
                    <a href="javascript:void(0)" class="p12" title="pattern 12"></a>
                </p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
        <!-- /#colorModal -->

		<!--Block UI Start-->	
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery.blockUI.js"></script>
		<script src="<?php echo base_url();?>js/jquery.form.js" type="text/javascript" charset="utf-8"></script>
		<!--Block UI End-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url();?>assets/js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        <script src="<?php echo base_url();?>assets/js/vendor/jquery-migrate-1.1.1.min.js"></script>

      <!--<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js"></script>-->
        <script>window.jQuery.ui || document.write('<script src="<?php echo base_url();?>assets/js/vendor/jquery-ui-1.10.0.custom.min.js"><\/script>')</script>


        <script src="<?php echo base_url();?>assets/js/vendor/bootstrap.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url();?>assets/js/lib/jquery.tablesorter.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/lib/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/lib/DT_bootstrap.js"></script>
        <script src="<?php echo base_url();?>assets/js/lib/responsive-tables.js"></script>
        <script type="text/javascript">
            jQuery(function() {
                bizstrapTable();
            });
        </script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/main.js"></script>
		
		<!--main Footer-->
		<!-- Placed at the end of the document so the pages load faster -->    
   		<!-- <script type="text/javascript" src="<?php echo base_url()?>js/custom.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>js/tag-it.min.js"></script>
      
       <script type="text/javascript" src="<?php echo base_url()?>js/jquery.fancybox.pack.js?v=2.1.0"></script>
		<script type="text/javascript" src="<?php echo base_url()?>js/jquery.flexslider-min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>js/jquery.isotope.js"></script>-->
		<script type="text/javascript" src="<?php echo base_url()?>js/style-switcher/style-switcher.js"></script>
		
		<script type="text/javascript" src="<?php echo base_url()?>rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	   
		<!--<script type="text/javascript" src="<?php echo base_url()?>js/revolution.custom.js"></script>-->
		<!--main Footer End-->
		</div>
		</div>
    </body>
</html>