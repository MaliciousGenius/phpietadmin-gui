<div class="workspace">
    <div class="container">
        <div class="panel panel-default">
            <ol class='panel-heading breadcrumb'>
                <li><a href='#'>Config</a></li>
                <li class='active'>User</li>
            </ol>
            <div class="modal fade" id="editPasswordModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title">Edit password</h3>
                        </div>
                        <div class="modal-body">
                            <input hidden id="savedUsername">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon input-group-addon-25">New password</span>
                                        <input type="password" class="form-control passwordInput" id="inputPassword" placeholder="New password...">
                                    </div>
                                </div>
                            </div>
                            <div class="row top-buffer">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon input-group-addon-25">Repeat password</span>
                                        <input type="password" class="form-control passwordInput" id="inputPasswordRepeat" placeholder="Repeat password...">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div id="showErrorInModal" class="col-md-5"></div>
                                <div class="col-md-5 col-md-offset-2">
                                    <button type="button" class="btn btn-default" id="exitPasswordEditModal" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Close</button>
                                    <button class="btn btn-success has-spinner" type="submit" id="savePasswordButton" data-loading-text='<span class="glyphicon glyphicon-refresh glyphicon-spin"></span> Saving...'>
                                        <span class="glyphicon glyphicon-save" aria-hidden="true"></span> Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title">Create user</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon input-group-addon-25">Username</span>
                                        <input type="text" class="form-control" id="usernameNew" placeholder="Username...">
                                    </div>
                                </div>
                            </div>
                            <div class="row top-buffer">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon input-group-addon-25">Password</span>
                                        <input type="password" class="passwordInputCreateUser form-control" id="inputPasswordNew" placeholder="Password...">
                                    </div>
                                </div>
                            </div>
                            <div class="row top-buffer">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon input-group-addon-25">Repeat password</span>
                                        <input type="password" class="passwordInputCreateUser form-control" id="inputPasswordRepeatNew" placeholder="Repeat password...">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div id="showErrorInCreateUserModal" class="col-md-5"></div>
                                <div class="col-md-5 col-md-offset-2">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Close</button>
                                    <button class="btn btn-success has-spinner" id="saveUserButton" type="submit" data-loading-text='<span class="glyphicon glyphicon-refresh glyphicon-spin"></span> Creating...'>
                                        <span class="glyphicon glyphicon-save" aria-hidden="true"></span> Create
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table white-table" id="userTable">
                    <thead>
                        <tr>
                            <th class="col-md-4 col-sm-4">Username</th>
                            <th class="col-md-6 col-sm-4">Permission</th>
                            <th class="col-md-1 col-sm-1 text-center"></th>
                            <th class="col-md-1 col-sm-1 text-center"><button class="btn btn-xs btn-success" data-toggle="modal" data-target="#createUserModal"><span class="glyphicon glyphicon-plus"></span> Add</button></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if ($data !== false) { ?>
                        <?php foreach ($data as $user) { ?>
                            <tr>
                                <td class="col-md-4 col-sm-4 username"><?php echo htmlspecialchars($user['username']) ?></td>
                                <td class="col-md-6 col-sm-4"><?php echo htmlspecialchars($user['permission']) ?></td>
                                <td class="col-md-1 col-sm-1 text-center">
                                    <button class="btn btn-xs btn-warning editPasswordSpan has-spinner" type="submit" data-toggle="modal" data-target="#editPasswordModal" data-loading-text='<span class="glyphicon glyphicon-refresh glyphicon-spin"></span> Editing...'>
                                        <span class="glyphicon glyphicon-pencil"></span> Edit
                                    </button>
                                </td>
                                <td class="col-md-1 col-sm-1 text-center">
                                    <button class="btn btn-xs btn-danger deleteUserSpan has-spinner" type="submit" data-loading-text='<span class="glyphicon glyphicon-refresh glyphicon-spin"></span> Deleting...'>
                                        <span class="glyphicon glyphicon-trash"></span> Delete
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
					<?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        require(['common'],function() {
            require(['pages/config/userConfigMenu', 'domReady'], function(methods, domReady) {
				domReady(function () {
                    methods.editPasswordModel();
                    methods.addUserModal();
                    methods.table();
            	});
            });
        });
    </script>
</div>