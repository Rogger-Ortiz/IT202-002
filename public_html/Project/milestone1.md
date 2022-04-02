<table><tr><td> <em>Assignment: </em> IT202 Milestone1 Deliverable</td></tr>
<tr><td> <em>Student: </em> Rogger Ortiz(ro77)</td></tr>
<tr><td> <em>Generated: </em> 4/1/2022 9:48:23 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-002-S22/it202-milestone1-deliverable/grade/ro77" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol>
<li>Checkout Milestone1 branch</li>
<li>Create a milestone1.md file in your Project folder</li>
<li>Git add/commit/push this empty file to Milestone1 (you&#39;ll need the link later) </li>
<li>Fill in the deliverable items<ol>
<li>For the proposal.md file use the direct link to milestone1.md from the Milestone1 branch for all of the features  </li>
<li>For each feature, add a direct link (or links) to the expected file the implements the feature from Heroku Prod (I.e, <a href="https://mt85-prod.herokuapp.com/Project/register.php">https://mt85-prod.herokuapp.com/Project/register.php</a>)</li>
</ol>
</li>
<li>Ensure your images display correctly in the sample markdown at the bottom</li>
<li>Save the submission items</li>
<li>Copy/paste the markdown from the &quot;Copy markdown to clipboard link&quot;</li>
<li>Paste the code into the milestone1.md file</li>
<li>Git add/commit/push the md file to Milestone1</li>
<li>Double check the images load when viewing the markdown file (points will be lost for invalid/non-loading images)</li>
<li>Make a pull request from Milestone1 to dev and merge it (resolve any conflicts)<ol>
<li>Make sure everything looks ok on heroku</li>
</ol>
</li>
<li>Make a pull request from dev to prod (resolve any conflicts) <ol>
<li>Make sure everything looks ok on heroku</li>
</ol>
</li>
<li>Submit the direct link from github prod branch to the milestone1.md file (no other links will be accepted and will result in 0)</li>
</ol>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Feature: User will be able to register a new account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/161358037-9b0a5c0d-6b0a-4aa8-9180-67b8f1907954.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Form Fields (Username, Email, Pass, Confirm)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/161358134-567c0355-6bb4-484d-9bdf-905470933d97.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Email Required<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/161358154-6c03777b-463a-4822-b098-34868293a0e1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Username Required<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/161358193-f42f75e6-7a00-4080-978b-3639256d616c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Passwords must match<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the Users table with data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/161358253-d114d8d7-137b-4de7-9486-89d0f53b0394.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>User table with data, hashed passwords, and unique username and email<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/161359068-5a30b3bb-8216-48b2-943e-620784ff1828.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Email is taken<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/161359261-d7b3b7cd-6af7-42c5-afdb-3b2d695535c5.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Username is taken<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Rogger-Ortiz/IT202-002/pull/35">https://github.com/Rogger-Ortiz/IT202-002/pull/35</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Rogger-Ortiz/IT202-002/pull/14">https://github.com/Rogger-Ortiz/IT202-002/pull/14</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>Sorry in advance for the multiple links, I had to go back and<br>edit what I did not finish during our time in class. The code<br>in Pull14 adds the base of the register and login, which validates the<br>user input. The uniqueness is in another pull but Pull35 makes sure that<br>the form is not reset on failed input <br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Feature: User will be able to login to their account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/161359807-7519ecb2-12fa-4ec1-8b87-379d21ad04af.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Login with Username/Email and password<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/161359855-b9dfa514-8c56-4ba0-8574-e4ba478d6a39.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Password required<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/161359875-d89bd22d-9d57-420e-b48c-851355a233c1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Invalid Email/Username<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/161359884-089590ed-b8b7-4ae3-ab14-1c15b1bb430f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>invalid password<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/161359925-582c76c6-7aec-45b1-aeae-7116ad4ad1cd.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Home.php is protected landing page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of successful login</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/161359916-2dd57115-9a74-4b89-9fdb-d4b2c38e1b6c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Successful login<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Rogger-Ortiz/IT202-002/pull/15">https://github.com/Rogger-Ortiz/IT202-002/pull/15</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>Pull15 is the navigation. The protection pages are in a future pull. The<br>code redirects the user based on if the session is logged in or<br>not, and whether or not they have the permissions to view the pages.<br>Otherwise, bounce them back to log in.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Feat: Users will be able to logout </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the successful logout message</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/161360020-50bd37ac-bfe5-4625-b945-fa191d2ad74b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Successful logout<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the logged out user can't access a login-protected page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/161359925-582c76c6-7aec-45b1-aeae-7116ad4ad1cd.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Same as above, home is protected page.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Rogger-Ortiz/IT202-002/pull/15">https://github.com/Rogger-Ortiz/IT202-002/pull/15</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>This was also implemented in the navigation feature, doing the same thing as<br>the login feature, but just destroying the session on logout so that the<br>user cannot access previous pages by any means.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Feature: Basic Security Rules Implemented / Basic Roles Implemented </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the logged out user can't access a login-protected page (may be the same as similar request)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/161359925-582c76c6-7aec-45b1-aeae-7116ad4ad1cd.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Ditto<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing a user without an appropriate role can't access the role-protected page (a test/dummy page is fine)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/161360144-a66e2aec-2c98-48ac-acc8-9f0dde839ec6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Random user cannot access admin protected page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the Roles table with data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/161360162-aa85b7a6-4e7f-4683-a1aa-a1fdeb83664f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Only one admin is given a role (which is ro77)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot of the UserRoles table with data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/161360176-3dc1d3cb-ec5c-4f4f-85df-e5cb310f92d9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Link between Roles and Users table<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add the related pull request(s) for these features</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Rogger-Ortiz/IT202-002/pull/32">https://github.com/Rogger-Ortiz/IT202-002/pull/32</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Explain briefly how the process/code works for login-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>Session holds the data for the associated user. Session is destroyed on logout.<br>Since there is then no user data associated at the moment the user<br>tries to enter the page again, they are not allowed.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 7: </em> Explain briefly how the process/code works for role-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>The roles table holds a M:N relationship table<br>The users table holds a M:N<br>relationship table<br>The UserRoles table holds the link between the Users and the Roles<br>tables by using foreign keys to reference both.</p><br><p>If user doesnt have role, dont<br>let them in.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Feature: Site should have basic styles/theme applied; everything should be styled </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots to show examples of your site's styles/theme</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/161360263-2297a767-c4fe-4d8d-9062-21007563b559.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>It&#39;s garbage, but its a blue/gold theme. Just an edited version of what<br>we did in class.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Rogger-Ortiz/IT202-002/pull/20">https://github.com/Rogger-Ortiz/IT202-002/pull/20</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain your CSS at a high level</td></tr>
<tr><td> <em>Response:</em> <p>Background colors are a custom blue (38,89,153), yellow for alerts, red for failures.</p><br><p>nav<br>li a &gt; lighter custom yellow (244,242,201)<br>nav li &gt; darker custom yellow (213,173,54)<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Feature: Any output messages/errors should be "user friendly" </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of some examples of errors/messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/161360483-812d718d-eb98-4a5d-9e15-bfa9d6bbc648.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>User friendly error message. For the sake of redundancy, view deliverable 1 for<br>other friendly error messages.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a related pull request</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Rogger-Ortiz/IT202-002/pull/17">https://github.com/Rogger-Ortiz/IT202-002/pull/17</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how you made messages user friendly</td></tr>
<tr><td> <em>Response:</em> <p>Flash messages were introduced in order to aid the deliverance of the messages.<br>These flash messages gave the user &quot;human&quot; feedback that would appear better than<br>the machine error code.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> Feature: Users will be able to see their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/161360622-b7005c8d-d2f7-43dd-9c8d-24393c783998.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>User profile page, Email and Username visible<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Rogger-Ortiz/IT202-002/pull/20">https://github.com/Rogger-Ortiz/IT202-002/pull/20</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Explain briefly how the process/code works (view only)</td></tr>
<tr><td> <em>Response:</em> <p>The user just accesses a form with their $_POST[&quot;Username&quot;] and $_POST[&quot;email&quot;] variables in<br>view.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> Feature: User will be able to edit their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page validation messages and success messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/161360681-9c69b7d3-7dff-49c0-ba6c-f39ab05be36e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Validation Message<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/161360739-d2c6cc28-0858-4b92-9e9d-ec3f1bd2d894.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Success Message<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add before and after screenshots of the Users table when a user edits their profile</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/161360706-af40e4c5-0e67-441a-9e9f-598e9273190c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before Edit<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/161360751-ef0e967c-25c1-42bf-bd9e-e97cd56efa3d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After Edit<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Rogger-Ortiz/IT202-002/pull/20">https://github.com/Rogger-Ortiz/IT202-002/pull/20</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works (edit only)</td></tr>
<tr><td> <em>Response:</em> <p>The current password is verified, then the new passwords are validated, and entered<br>if they pass validation. The new passwords are hashed and replace the old<br>passwords. Same goes for email. Check/Sanitize/Validate/Replace.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 9: </em> Proposal and Issues </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing your updated proposal.md file with checkmarks, dates, and link to milestone1.md accordingly and a direct link to the path on heroku prod (see instructions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/161360797-327d0e90-6329-42b6-9168-5949d47516be.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Proposal.md for Milestone1<br></p>
</td></tr>
<tr><td><img width="768px" src="https://ro77-prod.herokuapp.com/Project/proposal.md"/></td></tr>
<tr><td> <em>Caption:</em> <p>Proposal.md link<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/161360834-def918d2-47e7-4e7e-a05c-7116104a3150.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>All issues completed, all issues moved to closed.<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-002-S22/it202-milestone1-deliverable/grade/ro77" target="_blank">Grading</a></td></tr></table>