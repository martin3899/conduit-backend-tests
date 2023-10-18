# Troubleshooting sheet

### I) First error: Error User.php line 59

**Given**: I was looking for testing the functien which set a crypted password. For example, I expected that User 1 password unhashed was similar to the user password.  



**When**: I ran this test i received an error type like: **General error: 20 datatype mismatch**.

**Then**: I suggest you to change the attributes of the crypted password. It's supposed to be a **string**, not an integer. 
