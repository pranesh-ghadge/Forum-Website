<div class="modal fade" id="login" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
    <div class="modal-dialog glass-panel">
        <div class="modal-content glass-panel">
            <div class="modal-header glass-panel" style="border-radius: 15px">
                <h5 class="modal-title" id="loginLabel">LOGIN</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body glass-panel" style="border-radius: 0px 0px 15px 15px;">
                <form action="index.php" method="POST">
                    <div class="mb-3">
                        <label for="lusername" class="form-label">Username</label>
                        <input type="text" class="form-control" name="lusername" id="lusername"
                            aria-describedby="emailHelp" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="lpassword" class="form-label">Password</label>
                        <input type="password" class="form-control" name="lpassword" id="lpassword" required>
                    </div>
                    <button type="submit" class="btn btn-primary button" name="login">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

?>