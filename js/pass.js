@ {
    newPassword = Request["newPassword"];
    confirmPassword = Request["confirmPassword"];
    token = Request["token"];
    if IsPost {
        // input testing is ommitted here to save space
        retunValue = ResetPassword(token, newPassword);
    }
}