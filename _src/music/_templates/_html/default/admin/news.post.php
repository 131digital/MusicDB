<h3 class=left > New Post </h3>
<div class="body-con">
   <form action="Javascript:void(0)" method="post" onsubmit="go_post('admin/news/post',this,'','')" accept="">
        <div style="float:right;width:205px;border:1px solid #EBEBEB;padding:10px;">
           		<h3>Categories</h3>
                <div align=left style="float:right;width:200px;" class="catbox">
                <?php
                    echo $this->get_category();
                ?>
                </div>
        </div>
       <label> Post Title:</label>
       <input type="text" class="post-ok" name="title" id="title" onBlur="auto_get_seo('title','seo');" ><br>
       <label> SEO URL:</label>
       <input type="text" class="tiptip-top" name="seo"  id="seo" title="SEO for Friendly URL" accept=""> <br>
       <label> Post Status:</label>
       <select name="status" id="status" >
            <option value="active">Active / Publish</option>
            <option value="pending">Pending</option>
            <option value="inactive">InActive</option>
       </select> <br>
       <label>Featured Picture:</label>
       <input type="text" class="tiptip-top" name="picture"  id="picture" value="http://" id="seo" title="URL For Featured Picture" accept=""> <br>
       <label>Post Date:</label>
       <input type="text" name="date" id="date" value="<?=@date("m/d/Y")?>"  readonly="" > <br><br>

       <label>Post Content:</label>
       <textarea id="post" name="post" id="post" title="Full Contents" cols="50" rows="20" class="box-large wysiwyg"></textarea>
       <BR>
       <label> Tags:</label>
       <input type="text" class="tiptip-top" name="tag"  id="tag" title="Use (,) to multi tags" accept=""> <br>

       <p align=center class="">
           <input type="submit" value="Submit Post" >
       </p>
   </form>
</div>
<script language="Javascript">
    $("#date").datepicker();
</script>