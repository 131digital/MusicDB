<?php
// Variables used by required files for different pages
$page_title = 'TurboAdmin - Gallery';
$page_name  = 'gallery';

?>
<!DOCTYPE html>
<html>

    <!-- require head tag -->
    <?php require('inc/01_head.php'); ?>

    <body<?php if ($turboadmin_layout) echo ' class="'.$turboadmin_layout.'"'; ?>>

		<!-- Container -->
		<div id="container">

            <!-- require Adminbar -->
			<?php require('inc/02_adminbar.php'); ?>

			<!-- Panel Outer -->
			<div id="panel-outer" class="radius">

				<!-- Panel -->
				<div id="panel" class="radius">

                    <!-- require main menu -->
                    <?php require('inc/03_menu.php'); ?>

					<!-- Content -->
					<div id="content" class="clearfix">

                        <!-- Sidebar -->
                        <div id="side-content-left">
                            
                            <!-- Image Upload Box -->
                            <h3>Image Upload</h3>
                            
                            <div class="body-con">
                                
                                <div class="msg-loading">Uploading..</div>
                                
                                <form action="javascript: void(0)" method="post" enctype="multipart/form-data" id="upload-form" name="upload-form">
                                    <label for="upload-title">Title</label>
                                    <input type="text" id="upload-title" name="upload-title" />
                                    <label for="upload-tags">Tags</label>
                                    <input type="text" id="upload-tags" name="upload-tags" />
                                    <label for="upload-gallery">Gallery</label>
                                    <select id="upload-gallery" name="upload-gallery">
                                        <option value="0" selected>Choose</option>
                                        <option value="1">Gallery 1</option>
                                        <option value="2">Gallery 2</option>
                                        <option value="3">Gallery 3</option>
                                        <option value="4">Gallery 4</option>
                                    </select>
                                    <label for="upload-image">Image</label>
                                    <input type="file" id="upload-image" name="upload-image" />
                                    <p class="tcenter">
                                        <input type="submit" value="Upload" id="upload-btn" name="upload-btn" />
                                    </p>
                                </form>
                                
                            </div>
                            <!-- END Image Upload Box -->
                            
                            <!-- Mini Gallery Box -->
                            <h3>Mini Gallery</h3>
                            <div class="body-con">
                                
                                <ul class="image-gallery clearfix">
                                    <li>
                                        <img src="img/image.jpg" alt="image" width="84" height="84" />
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image.jpg" alt="image" width="84" height="84" />
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image.jpg" alt="image" width="84" height="84" />
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image.jpg" alt="image" width="84" height="84" />
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image.jpg" alt="image" width="84" height="84" />
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image.jpg" alt="image" width="84" height="84" />
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                </ul>
                                
                            </div>
                            <!-- END Mini Gallery Box -->
                            
                            <!-- Info Box -->
                            <h3>Make it yours</h3>
                            <div class="body-con">
                                <p><strong>TurboAdmin</strong> is flexible and customizable.</p>
                                <p>Create the <strong>widgets</strong> you want, use a <strong>sidebar</strong> if you like, a <strong>submenu</strong> maybe, an <strong>adminbar</strong> that follows you..</p>
                            </div>
                            <!-- END Info Box -->
                            
                        </div>
                        <!-- END Sidebar -->
                        
                        <!-- Main Content -->
                        <div id="main-content-right">
                            
                            <!-- Gallery select and search -->
                            <div class="simple-con tleft">
                                <select id="select-view" name="select-view">
                                    <option value="0">Gallery 1</option>
                                    <option value="1" >Gallery 2</option>
                                    <option value="2" selected>Gallery 3</option>
                                    <option value="3">Gallery 4</option>
                                </select>
                                <form action="javascript: void(0)" method="post" id="search-form" name="search-form" class="fright pos-rel">
                                    <input type="text" id="search-images" name="search-images" value="Title or tags.." onfocus="this.value = '';" class="search-con" />
                                    <input type="submit" value="Search" id="search-btn" name="search-btn" class="green search-con" />
                                </form>
                            </div>
                            
                            <!-- Images -->
                            <div class="image-gallery-con simple-con">
                                
                                <ul class="image-gallery clearfix">
                                    <li>
                                        <img src="img/image.jpg" alt="image" />
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image.jpg" alt="image" />
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image.jpg" alt="image" />
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image.jpg" alt="image" />
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image.jpg" alt="image" />
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image.jpg" alt="image" />
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image.jpg" alt="image" />
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image.jpg" alt="image" />
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image.jpg" alt="image" />
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image.jpg" alt="image" />
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image.jpg" alt="image" />
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image.jpg" alt="image" />
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image.jpg" alt="image" />
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image.jpg" alt="image" />
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image.jpg" alt="image" />
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image.jpg" alt="image" />
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image.jpg" alt="image" />
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image.jpg" alt="image" />
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image.jpg" alt="image" />
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image.jpg" alt="image" />
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image.jpg" alt="image" />
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image.jpg" alt="image" />
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image.jpg" alt="image" />
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image.jpg" alt="image" />
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                </ul>
                                
                            </div>
                            <!-- END Images -->
                            
                            <!-- Galleries -->
                            <table>
                                <thead>
                                    <tr>
                                        <th colspan="4">Galleries</th>
                                    </tr>
                                    <tr>
                                        <th>Gallery Name</th>
                                        <th>Images</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Gallery 1</td>
                                        <td>100</td>
                                        <td><a href="javascript: void(0)" class="tiptip-top" title="Edit"><img src="img/icon_edit.png" alt="edit" /></a></td>
                                        <td><a href="javascript: void(0)" class="tiptip-top" title="Delete"><img src="img/icon_bad.png" alt="delete" /></a></td>
                                    </tr>
                                    <tr>
                                        <td>Gallery 2</td>
                                        <td>75</td>
                                        <td><a href="javascript: void(0)" class="tiptip-top" title="Edit"><img src="img/icon_edit.png" alt="edit" /></a></td>
                                        <td><a href="javascript: void(0)" class="tiptip-top" title="Delete"><img src="img/icon_bad.png" alt="delete" /></a></td>
                                    </tr>
                                    <tr>
                                        <td>Gallery 3</td>
                                        <td>24</td>
                                        <td><a href="javascript: void(0)" class="tiptip-top" title="Edit"><img src="img/icon_edit.png" alt="edit" /></a></td>
                                        <td><a href="javascript: void(0)" class="tiptip-top" title="Delete"><img src="img/icon_bad.png" alt="delete" /></a></td>
                                    </tr><tr>
                                        <td>Gallery 4</td>
                                        <td>1000</td>
                                        <td><a href="javascript: void(0)" class="tiptip-top" title="Edit"><img src="img/icon_edit.png" alt="edit" /></a></td>
                                        <td><a href="javascript: void(0)" class="tiptip-top" title="Delete"><img src="img/icon_bad.png" alt="delete" /></a></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                            <!-- END Galleries -->
                            
                            <!-- Add Gallery -->
                            <h2>Add Gallery</h2>
                            
                            <div class="body-con">
                                
                                <form action="javascript: void(0)" method="post" id="addgalery-form" name="addgallery-form">
                                    <ul class="align-list">
                                        <li>
                                            <label for="addgallery-title">Title</label>
                                            <input type="text" id="addgallery-title" name="addgallery-title" />
                                        </li>
                                        <li>
                                            <label for="addgallery-description">Description</label>
                                            <textarea id="addgallery-description" name="addgallery-description" cols="10" rows="1" class="box-large elastic"></textarea>
                                        </li>
                                        <li>
                                            <label></label>
                                            <input type="submit" value="Add" id="addgallery-btn" name="addgallery-btn" />
                                        </li>
                                    </ul>
                                </form>
                                
                            </div>
                            <!-- END Add Gallery -->
                            
                        </div>
                        <!-- END Main Content -->

					</div>
					<!-- END Content -->

                    <!-- require Footer -->
					<?php require('inc/04_footer.php'); ?>

				</div>
				<!-- END Panel -->

			</div>
			<!-- END Panel Outer -->

		</div>
		<!-- END Container -->

		<!-- Push -->
		<div class="push"></div>
		<!-- END Push -->

        <!-- require Javascript -->
        <?php require('inc/05_scripts.php'); ?>

	</body>

</html>