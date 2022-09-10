<div class="modal fade" id="signup" tabindex="-1" aria-labelledby="signupLabel" aria-hidden="true">
    <div class="modal-dialog glass-panel">
        <div class="modal-content glass-panel">
            <div class="modal-header glass-panel">
                <h5 class="modal-title" id="signupLabel">SIGNUP</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body glass-panel" style="border-radius: 0px 0px 15px 15px;" >
                <form action="index.php" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label" >Username</label>
                        <input type="text" class="form-control" name="username" id="username"
                            aria-describedby="emailHelp" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label" >Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="rpassword" class="form-label">Re-enter password</label>
                        <input type="password" class="form-control" name="rpassword" id="rpassword" required>
                    </div>
                    <button type="submit" name="signup" class="btn btn-primary button">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>