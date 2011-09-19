
                            <h2>Manage Articles</h2>
                            
                            <!-- View select and search -->
                            <div class="simple-con tleft">
                                <select id="select-view" name="select-view">
                                    <option value="0" selected>Show 5</option>
                                    <option value="1">Show 10</option>
                                    <option value="2">Show 25</option>
                                    <option value="3">Show All</option>
                                </select>
                                <form action="javascript: void(0)" method="post" id="search-form" name="search-form" class="fright pos-rel">
                                    <input type="text" id="search-articles" name="search-articles" value="Title or author.." onfocus="this.value = '';" class="search-con" />
                                    <input type="submit" value="Search" id="search-btn" name="search-btn" class="grey search-con" />
                                </form>
                            </div>
                            
                            <!-- Articles table -->
                            <table>
                                <thead>
                                    <tr>
                                        <th colspan="2">Thumbnail</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Published</th>
                                        <th>Comments</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="backcolor"><input type="checkbox" id="check-article1" /></td>
                                        <td><img src="img/image.jpg" alt="thumnail" width="60" height="60" /></td>
                                        <td><a href="javascript: void(0)">Article's title</a></td>
                                        <td><a href="javascript: void(0)" class="agreen">Author's name</a></td>
                                        <td>01/01/2011 12:00</td>
                                        <td>60</td>
                                        <td><a href="javascript: void(0)" class="tiptip-top" title="Edit"><img src="img/icon_edit.png" alt="edit" /></a></td>
                                        <td><a href="javascript: void(0)" class="tiptip-top" title="Delete"><img src="img/icon_bad.png" alt="delete" /></a></td>
                                    </tr>
                                    <tr>
                                        <td class="backcolor"><input type="checkbox" id="check-article2" /></td>
                                        <td><img src="img/image.jpg" alt="thumnail" width="60" height="60" /></td>
                                        <td><a href="javascript: void(0)">Article's title</a></td>
                                        <td><a href="javascript: void(0)" class="agreen">Author's name</a></td>
                                        <td>01/01/2011 12:00</td>
                                        <td>5</td>
                                        <td><a href="javascript: void(0)" class="tiptip-top" title="Edit"><img src="img/icon_edit.png" alt="edit" /></a></td>
                                        <td><a href="javascript: void(0)" class="tiptip-top" title="Delete"><img src="img/icon_bad.png" alt="delete" /></a></td>
                                    </tr>
                                    <tr>
                                        <td class="backcolor"><input type="checkbox" id="check-article3" /></td>
                                        <td><img src="img/image.jpg" alt="thumnail" width="60" height="60" /></td>
                                        <td><a href="javascript: void(0)">Article's title</a></td>
                                        <td><a href="javascript: void(0)" class="agreen">Author's name</a></td>
                                        <td>01/01/2011 12:00</td>
                                        <td>500</td>
                                        <td><a href="javascript: void(0)" class="tiptip-top" title="Edit"><img src="img/icon_edit.png" alt="edit" /></a></td>
                                        <td><a href="javascript: void(0)" class="tiptip-top" title="Delete"><img src="img/icon_bad.png" alt="delete" /></a></td>
                                    </tr>
                                    <tr>
                                        <td class="backcolor"><input type="checkbox" id="check-article4" /></td>
                                        <td><img src="img/image.jpg" alt="thumnail" width="60" height="60" /></td>
                                        <td><a href="javascript: void(0)">Article's title</a></td>
                                        <td><a href="javascript: void(0)" class="agreen">Author's name</a></td>
                                        <td>01/01/2011 12:00</td>
                                        <td>100</td>
                                        <td><a href="javascript: void(0)" class="tiptip-top" title="Edit"><img src="img/icon_edit.png" alt="edit" /></a></td>
                                        <td><a href="javascript: void(0)" class="tiptip-top" title="Delete"><img src="img/icon_bad.png" alt="delete" /></a></td>
                                    </tr>
                                    <tr>
                                        <td class="backcolor"><input type="checkbox" id="check-article5" /></td>
                                        <td><img src="img/image.jpg" alt="thumnail" width="60" height="60" /></td>
                                        <td><a href="javascript: void(0)">Article's title</a></td>
                                        <td><a href="javascript: void(0)" class="agreen">Author's name</a></td>
                                        <td>01/01/2011 12:00</td>
                                        <td>15</td>
                                        <td><a href="javascript: void(0)" class="tiptip-top" title="Edit"><img src="img/icon_edit.png" alt="edit" /></a></td>
                                        <td><a href="javascript: void(0)" class="tiptip-top" title="Delete"><img src="img/icon_bad.png" alt="delete" /></a></td>
                                    </tr>
                                    <tr>
                                        <td colspan="8" class="backcolor tright">
                                            <button class="green">Edit Selected</button>
                                            <button class="red" onclick="apprise('Are you sure you want to delete the selected articles?', {'animate':true});">Delete Selected</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- END Manage Articles -->
                            
                            <!-- Articles pagination -->
                            <div class="simple-con pad-none">
                                <ul class="pagination tcenter">
                                    <li><a href="javascript: void(0)" class="page radius">Previous</a></li>
                                    <li><a href="javascript: void(0)" class="page radius">1</a></li>
                                    <li><a href="javascript: void(0)" class="page radius">2</a></li>
                                    <li><span class="page-active radius">3</span></li>
                                    <li><a href="javascript: void(0)" class="page radius">4</a></li>
                                    <li>...</li>
                                    <li><a href="javascript: void(0)" class="page radius">29</a></li>
                                    <li><a href="javascript: void(0)" class="page radius">30</a></li>
                                    <li><a href="javascript: void(0)" class="page radius">Next</a></li>
                                </ul>
                            </div>
                            <!-- END Articles pagination -->
                            
                            <!-- Add Article -->
                            <h2>Add New Article</h2>
                            
                            <!-- Add Article form -->
                            <form action="javascript: void(0)" method="post" enctype="multipart/form-data" id="addarticle-form" name="addarticle-form">
                                
                                <fieldset>
                                    <ul class="align-list">
                                        <li>
                                            <label for="addarticle-title">Title</label>
                                            <input type="text" id="addarticle-title" name="addarticle-title" class="box-xlarge" />
                                        </li>
                                        <li>
                                            <label for="addarticle-content">Content</label>
                                            <textarea id="addarticle-content" name="addarticle-content" cols="10" rows="25" class="wysiwyg box-xlarge"></textarea>
                                        </li>
                                        <li>
                                            <label for="addarticle-publish">Publish Date</label>
                                            <input type="text" id="addarticle-publish" name="addarticle-publish" class="box-small datepicker" />
                                            <span class="msg-form-info">Leave blank for current date & time</span>
                                        </li>
                                        <li>
                                            <label for="addarticle-image">Upload Image</label>
                                            <input type="file" id="addarticle-image" name="addarticle-image"/>
                                        </li>
                                        <li>
                                            <label for="addarticle-category">Category</label>
                                            <select id="addarticle-category" name="addarticle-category">
                                                <option value="0" selected>Choose</option>
                                                <option value="1">General</option>
                                                <option value="2">News</option>
                                                <option value="3">Gadgets</option>
                                                <option value="4">Reviews</option>
                                                <option value="5">Previews</option>
                                                <option value="6">Rumors</option>
                                            </select>
                                        </li>
                                        <li>
                                            <label>Enable Comments?</label>
                                            <label for="addarticle-enable" class="label-auto inside">Enable</label>
                                            <input type="radio" id="addarticle-enable" name="addarticle-comments" value="1" />
                                            <label for="addarticle-disable" class="label-auto inside">Disable</label>
                                            <input type="radio" id="addarticle-disable" name="addarticle-comments" value="2" checked />
                                        </li>
                                        <li>
                                            <label for="addarticle-active">Publish Now?</label>
                                            <input type="checkbox" id="addarticle-active" name="addarticle-active" value="1" />
                                        </li>
                                        <li>
                                            <label></label>
                                            <input type="submit" value="Submit" class="green" />
                                            <input type="submit" value="Clear all" class="red" onclick="this.form.reset();" />
                                        </li>
                                    </ul>
                                </fieldset>

                            </form>
                      