<?php
    $this->ftemp("news.sidebar");
?>
<div class="body-con">
    
    <?php
	if(isset($_GET['r'])) {
	?>
	 <!-- Sidebar tabs -->
    <ul id="s-tabs" class="content-tabs clearfix">
        <li><a href="#s-tab-addcat">Add</a></li>
        <li class="active" ><a href="#s-tab-editcat">Edit Category</a></li>
    </ul>
    <!-- END Sidebar tabs -->
                              
	<div id="s-tab-editcat">
    	<?php
		$r = $helper->fast('r', 1 , "number", "", true);	
		$ht = $db->fast_get("categories","`cat_key`='".$r."'");		
		?>
        <h3>Edit Categories</h3>
        <form action="javascript: void(0)" onsubmit="javascript: go_post('admin/news_categories/edit',this,'admin/news_categories');" method="post"
        	enctype="multipart/form-data" id="cat_frm_edit" name="cat_frm_edit">
            <label for="e_cat_name">Category Name</label>
            <input type="text" id="e_cat_name" name="e_cat_name"  onchange="auto_get_seo('e_cat_name','e_cat_seo');" value="" />
            <label for="e_cat_seo">SEO</label>
            <input type="text" id="e_cat_seo" name="e_cat_seo"  class="tiptip-top" title="SEO for category name"  />
            <label for="e_cat_parent">Parents</label>
            <select id="e_cat_parent" name="e_cat_parent">
                    <option value="0" selected>No Parents</option>
                    <?
                        echo $this->get_categories();
                    ?>
            </select>            
            <label for="e_cat_status">Status</label>
            <select name="e_cat_status" id="e_cat_status" >
                <option value="active">Active</option>
                <option value="inactive">InActive</option>
            </select>        
            <label for="e_cat_order">Order Number</label>    
            <input type=text name="e_cat_order" id="e_cat_order"  value="" />
            <input type=hidden name="e_cat_key" id="e_cat_key"  value="" />            
            <p class="tcenter">
                <input type="submit" value="Update Category" id="upload-btn" name="upload-btn" />
            </p>
        </form>        
    </div>                            
       <?php
	   		$helper->set_value("#e_cat_name",$ht['cat_name']);
	   		$helper->set_value("#e_cat_seo",$ht['cat_seo']);
	   		$helper->set_value("#e_cat_parent",$ht['cat_parent']);						
	   		$helper->set_value("#e_cat_status",$ht['cat_status']);	
			$helper->set_value("#e_cat_order",$ht['cat_order']);	
			$helper->set_value("#e_cat_key",$ht['cat_key']);						
	}
	?>
    <div id="s-tab-addcat">
    <h3>Add New Category</h3>
    <form action="javascript: void(0)" onsubmit="javascript: go_post('admin/news_categories/addnew',this,'admin/news_categories');" method="post" enctype="multipart/form-data" id="cat_frm_add" name="cat_frm_add">
        <label for="cat_name">Category Name</label>
        <input type="text" id="cat_name" name="cat_name"  onblur="auto_get_seo('cat_name','cat_seo');" />
        <label for="cat_seo">SEO</label>
        <input type="text" id="cat_seo" name="cat_seo"  class="tiptip-top" title="SEO for category name"  />
        <label for="cat_parent">Parents</label>
        <select id="cat_parent" name="cat_parent">
            	<option value="0" selected>No Parents</option>
            	<?
					echo $this->get_categories();
				?>
        </select>
        <label for="cat_status">Status</label>
        <select name="cat_status" id="cat_status" >
        	<option value="active">Active</option>
            <option value="inactive">InActive</option>
        </select>
        
        <p class="tcenter">
            <input type="submit" value="Create New Category" id="upload-btn" name="upload-btn" />
        </p>
    </form>
    </div>       
    
</div>


