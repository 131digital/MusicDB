<?php
// Variables used by required files for different pages
$page_title = 'TurboAdmin - Files';
$page_name  = 'files';

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
                        <div id="side-content-right">
                            
                            <!-- File Upload Box -->
                            <h3>File Upload</h3>
                            
                            <div class="body-con">
                                
                                <div class="msg-ok">File upload complete!</div>
                                
                                <form action="javascript: void(0)" method="post" enctype="multipart/form-data" id="upload-form" name="upload-form">
                                    <label for="upload-title">Title</label>
                                    <input type="text" id="upload-title" name="upload-title" />
                                    <label for="upload-tags">Tags</label>
                                    <input type="text" id="upload-tags" name="upload-tags" />
                                    <label for="upload-file">File</label>
                                    <input type="file" id="upload-file" name="upload-file" />
                                    <p class="tcenter">
                                        <input type="submit" value="Upload" id="upload-btn" name="upload-btn" class="green" />
                                    </p>
                                </form>
                                
                            </div>
                            <!-- END File Upload Box -->
                            
                            <!-- Quick Stats Box -->
                            <table>
                                <thead>
                                    <tr>
                                        <th colspan="2">Quick Stats</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="2" class="backcolor tbold">Top 3 Filetypes (last week)</td>
                                    </tr>
                                    <tr>
                                        <td class="tleft">Word (.doc)</td>
                                        <td>26</td>
                                    </tr>
                                    <tr>
                                        <td class="tleft">Word 2007+ (.docx)</td>
                                        <td>19</td>
                                    </tr>
                                    <tr>
                                        <td class="tleft">PDF</td>
                                        <td>15</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="backcolor tbold">Top 3 Contributors (last week)</td>
                                    </tr>
                                    <tr>
                                        <td class="tleft"><a href="javascript: void(0)">Mike</a></td>
                                        <td>20</td>
                                    </tr>
                                    <tr>
                                        <td class="tleft"><a href="javascript: void(0)">Lisa</a></td>
                                        <td>16</td>
                                    </tr>
                                    <tr>
                                        <td class="tleft"><a href="javascript: void(0)">Emma</a></td>
                                        <td>15</td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- END Quick Stats Box -->
                            
                            <!-- Info Box -->
                            <h3>Do you need more space?</h3>
                            <div class="body-con">
                                <p>Make it <strong>fluid</strong>, everything will adjust <strong>smoothly</strong> and you will have <strong>more time</strong> to code the functionality you want.</p>
                            </div>
                            <!-- END Info Box -->
                            
                        </div>
                        <!-- END Sidebar -->
                        
                        <!-- Main Content -->
                        <div id="main-content-left">
                            
                            <!-- New Files -->
                            <table>
                                <thead>
                                    <tr>
                                        <th colspan="6">New Files</th>
                                    </tr>
                                    <tr>
                                        <th>Preview</th>
                                        <th>Title</th>
                                        <th>Tags</th>
                                        <th>Uploader</th>
                                        <th>Uploaded</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="img/image_preview.png" alt="image" /></td>
                                        <td>filename1.ext</td>
                                        <td>tag1, tag2, tag3</td>
                                        <td><a href="javascript: void(0)">username</a></td>
                                        <td>01/01/2011 14:00</td>
                                        <td>
                                            <a href="javascript: void(0)" class="tiptip-top" title="View file"><img src="img/icon_view.png" alt="view" /></a>
                                            <a href="javascript: void(0)" class="tiptip-top" title="Download file"><img src="img/icon_download.png" alt="download" /></a>
                                            <a href="javascript: void(0)" class="tiptip-top" title="Approve file"><img src="img/icon_ok.png" alt="approve" /></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="img/image_preview.png" alt="image" /></td>
                                        <td>filename2.ext</td>
                                        <td>tag1, tag2, tag3</td>
                                        <td><a href="javascript: void(0)">cooluser</a></td>
                                        <td>01/01/2011 14:00</td>
                                        <td>
                                            <a href="javascript: void(0)" class="tiptip-top" title="View file"><img src="img/icon_view.png" alt="view" /></a>
                                            <a href="javascript: void(0)" class="tiptip-top" title="Download file"><img src="img/icon_download.png" alt="download" /></a>
                                            <a href="javascript: void(0)" class="tiptip-top" title="Approve file"><img src="img/icon_ok.png" alt="approve" /></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="img/image_preview.png" alt="image" /></td>
                                        <td>filename3.ext</td>
                                        <td>tag1, tag2, tag3</td>
                                        <td><a href="javascript: void(0)">Emma</a></td>
                                        <td>01/01/2011 14:00</td>
                                        <td>
                                            <a href="javascript: void(0)" class="tiptip-top" title="View file"><img src="img/icon_view.png" alt="view" /></a>
                                            <a href="javascript: void(0)" class="tiptip-top" title="Download file"><img src="img/icon_download.png" alt="download" /></a>
                                            <a href="javascript: void(0)" class="tiptip-top" title="Approve file"><img src="img/icon_ok.png" alt="approve" /></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="img/image_preview.png" alt="image" /></td>
                                        <td>filename4.ext</td>
                                        <td>tag1, tag2, tag3</td>
                                        <td><a href="javascript: void(0)">Mike</a></td>
                                        <td>01/01/2011 14:00</td>
                                        <td>
                                            <a href="javascript: void(0)" class="tiptip-top" title="View file"><img src="img/icon_view.png" alt="view" /></a>
                                            <a href="javascript: void(0)" class="tiptip-top" title="Download file"><img src="img/icon_download.png" alt="download" /></a>
                                            <a href="javascript: void(0)" class="tiptip-top" title="Approve file"><img src="img/icon_ok.png" alt="approve" /></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="img/image_preview.png" alt="image" /></td>
                                        <td>filename5.ext</td>
                                        <td>tag1, tag2, tag3</td>
                                        <td><a href="javascript: void(0)">Lisa</a></td>
                                        <td>01/01/2011 14:00</td>
                                        <td>
                                            <a href="javascript: void(0)" class="tiptip-top" title="View file"><img src="img/icon_view.png" alt="view" /></a>
                                            <a href="javascript: void(0)" class="tiptip-top" title="Download file"><img src="img/icon_download.png" alt="download" /></a>
                                            <a href="javascript: void(0)" class="tiptip-top" title="Approve file"><img src="img/icon_ok.png" alt="approve" /></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- END New Files -->
                            
                            <!-- Filetype filter select and search -->
                            <div class="simple-con tleft">
                                <select id="select-filter" name="select-filter">
                                    <option value="0" selected>Filter by Filetype</option>
                                    <option value="1">Word (.doc)</option>
                                    <option value="2">Word 2007+ (.docx)</option>
                                    <option value="3">PDF</option>
                                    <option value="4">PSD</option>
                                    <option value="4">Other</option>
                                </select>
                                <form action="javascript: void(0)" method="post" id="search-form" name="search-form" class="fright pos-rel">
                                    <input type="text" id="search-files" name="search-files" value="Title or tags.." onfocus="this.value = '';" class="search-con" />
                                    <input type="submit" value="Search" id="search-btn" name="search-btn" class="search-con" />
                                </form>
                            </div>
                            
                            <!-- Files Results -->
                            <div class="file-gallery-con simple-con">
                                
                                <ul class="file-gallery clearfix">
                                    <li>
                                        <img src="img/image_file.png" alt="file" /><span>filename.ext</span>
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_view.png" alt="view" class="tiptip-top" title="View" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_download.png" alt="download" class="tiptip-top" title="Download" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image_file.png" alt="file" /><span>filename.ext</span>
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_view.png" alt="view" class="tiptip-top" title="View" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_download.png" alt="download" class="tiptip-top" title="Download" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image_file.png" alt="file" /><span>filename.ext</span>
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_view.png" alt="view" class="tiptip-top" title="View" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_download.png" alt="download" class="tiptip-top" title="Download" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image_file.png" alt="file" /><span>filename.ext</span>
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_view.png" alt="view" class="tiptip-top" title="View" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_download.png" alt="download" class="tiptip-top" title="Download" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image_file.png" alt="file" /><span>filename.ext</span>
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_view.png" alt="view" class="tiptip-top" title="View" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_download.png" alt="download" class="tiptip-top" title="Download" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image_file.png" alt="file" /><span>filename.ext</span>
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_view.png" alt="view" class="tiptip-top" title="View" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_download.png" alt="download" class="tiptip-top" title="Download" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image_file.png" alt="file" /><span>filename.ext</span>
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_view.png" alt="view" class="tiptip-top" title="View" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_download.png" alt="download" class="tiptip-top" title="Download" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image_file.png" alt="file" /><span>filename.ext</span>
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_view.png" alt="view" class="tiptip-top" title="View" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_download.png" alt="download" class="tiptip-top" title="Download" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image_file.png" alt="file" /><span>filename.ext</span>
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_view.png" alt="view" class="tiptip-top" title="View" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_download.png" alt="download" class="tiptip-top" title="Download" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image_file.png" alt="file" /><span>filename.ext</span>
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_view.png" alt="view" class="tiptip-top" title="View" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_download.png" alt="download" class="tiptip-top" title="Download" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image_file.png" alt="file" /><span>filename.ext</span>
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_view.png" alt="view" class="tiptip-top" title="View" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_download.png" alt="download" class="tiptip-top" title="Download" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image_file.png" alt="file" /><span>filename.ext</span>
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_view.png" alt="view" class="tiptip-top" title="View" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_download.png" alt="download" class="tiptip-top" title="Download" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image_file.png" alt="file" /><span>filename.ext</span>
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_view.png" alt="view" class="tiptip-top" title="View" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_download.png" alt="download" class="tiptip-top" title="Download" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image_file.png" alt="file" /><span>filename.ext</span>
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_view.png" alt="view" class="tiptip-top" title="View" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_download.png" alt="download" class="tiptip-top" title="Download" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image_file.png" alt="file" /><span>filename.ext</span>
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_view.png" alt="view" class="tiptip-top" title="View" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_download.png" alt="download" class="tiptip-top" title="Download" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image_file.png" alt="file" /><span>filename.ext</span>
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_view.png" alt="view" class="tiptip-top" title="View" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_download.png" alt="download" class="tiptip-top" title="Download" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image_file.png" alt="file" /><span>filename.ext</span>
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_view.png" alt="view" class="tiptip-top" title="View" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_download.png" alt="download" class="tiptip-top" title="Download" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="img/image_file.png" alt="file" /><span>filename.ext</span>
                                        <div>
                                            <a href="javascript: void(0)"><img src="img/icon_edit.png" alt="edit" class="tiptip-top" title="Edit" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_view.png" alt="view" class="tiptip-top" title="View" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_download.png" alt="download" class="tiptip-top" title="Download" /></a>
                                            <a href="javascript: void(0)"><img src="img/icon_bad.png" alt="delete" class="tiptip-top" title="Delete" /></a>
                                        </div>
                                    </li>
                                </ul>
                                
                            </div>
                            <!-- END Files Results -->
                            
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