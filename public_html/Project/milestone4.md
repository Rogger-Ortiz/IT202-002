<table><tr><td> <em>Assignment: </em> IT202 Milestone 4 Bank Project</td></tr>
<tr><td> <em>Student: </em> Rogger Ortiz(ro77)</td></tr>
<tr><td> <em>Generated: </em> 5/8/2022 4:42:04 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-002-S22/it202-milestone-4-bank-project/grade/ro77" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol>
<li>Checkout Milestone4 branch </li>
<li>Create a new markdown file called milestone4.md</li>
<li>git add/commit/push immediate</li>
<li>Fill in the milestone4.md link (from Milestone4) into the proposal.md file under each milestone4 feature</li>
<li>For each feature in the proposal add a related direct link to Heroku prod for a file related to it the feature</li>
<li>Fill in the below deliverables</li>
<li>At the end copy the markdown and paste it into milestone4.md</li>
<li>Add/commit/push the changes to Milestone4</li>
<li>PR Milestone4 to dev and verify</li>
<li>PR dev to prod and verify</li>
<li>Checkout dev locally and pull changes</li>
<li>Submit the direct link to this new milestone4.md file from your GitHub prod branch to Canvas</li>
</ol>
<p>Note: Ensure all images appear properly on GitHub and everywhere else.
Images are only accepted from dev or prod, not localhost.
All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod). </p>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> User can set their profile to public or private </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of new column on the Users table</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/167312668-c0c58125-f7af-48d2-843e-d7057b2faddd.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Public Column<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of updated profile edit view</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/167312689-856ace6d-a332-42f5-96ad-ff97975d2fa2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>New public/private radio buttons<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshot of profile view view (ensure email isn't shown publicly)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/167312846-e4b6f921-fc23-4243-9b92-7d8532e178b5.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>difference between public (ro77) and private (others)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request(s) links</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Rogger-Ortiz/IT202-002/pull/95">https://github.com/Rogger-Ortiz/IT202-002/pull/95</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add direct link to a public profile from heroku</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://ro77-prod.herokuapp.com/Project/profile.php">https://ro77-prod.herokuapp.com/Project/profile.php</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Briefly explain the logic behind how public/private profile works</td></tr>
<tr><td> <em>Response:</em> <p>I just used the radio buttons to flag on/off the column in users.<br>Then to display i just ran a conditional statement on the column. If<br>true, show, if false, no.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> User will be able to open a savings account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the create account page for savings with the form filled in</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/167313052-2f7a86dd-71b5-4866-84af-26426e20b5ff.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Savings radio button and the 5 dollar deposit<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of the code that determines the APY</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/167313160-8841db9b-1343-4945-ba3e-a5666c9c473a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>The APY is just hard-coded for ease. But to display 0.01 as a<br>user-friendly number, i used this.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshots of the related error and success messages when creating a savings account</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/167313178-91a298e8-10b4-40d4-a493-f965140819c8.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Error<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/167313201-85e8a3b5-bb37-4787-b6ce-eeaec5d28547.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Success<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot of the db showing the new savings account</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/167313223-3a94daff-6f6d-412e-8628-ae50de1606d5.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Savings accounts<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Rogger-Ortiz/IT202-002/pull/95">https://github.com/Rogger-Ortiz/IT202-002/pull/95</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Add link to the related page on heroku</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://ro77-prod.herokuapp.com/Project/createaccount.php">https://ro77-prod.herokuapp.com/Project/createaccount.php</a> </td></tr>
<tr><td> <em>Sub-Task 7: </em> Briefly explain the logic behind the APY value</td></tr>
<tr><td> <em>Response:</em> <p>It was just hardcoded. I didn&#39;t do anything crazy to it because I<br>found the challenge behind storing the value and presenting it differently on the<br>users screen.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> User will be able to take out a loan </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot showing the form for opening a loan along with the system generated APY</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/167313425-6b34c992-1f6e-44b6-ba58-7fdd15dbf05c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Loan. APY was hard coded. I just looked up &quot;what is a good<br>apy for loans&quot;.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot showing the user's accounts that can be deposited into</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/167313461-71507b17-200d-4992-8390-bd5c010a9470.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>2 Accounts as seen above.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot from the db showing the loan account has a negative balance</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/167313519-2dbb422d-d735-4a7c-bf0f-b62f86fd325a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Loan has positive number here but I can explain (will be explained at<br>the end)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot from the User's account list page showing the loan displaying as a positive value</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/167313524-71bff9db-7bde-4419-9f18-9359b836b4b8.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Loan account<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a screenshot showing the code logic for updating the loan's balance per the requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/167313552-f86b32ef-d6f5-45ff-a575-24d92dd71d83.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Updating the account balance (not directly) and grabbing the new values.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add screenshot showing user can't transfer more money from a loan account (alternatively don't show loan accounts in the dropdown for transfer transactions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/167313570-615efb2f-a546-4b5b-bedb-fb4f296da2c8.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Cant select loan accounts<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 7: </em> Add screenshots of any other errors and success</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/167313592-c9713b3c-6192-4688-a5d1-6d900b75e29c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Error Messages (Success messages are seen above)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 8: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Rogger-Ortiz/IT202-002/pull/97">https://github.com/Rogger-Ortiz/IT202-002/pull/97</a> </td></tr>
<tr><td> <em>Sub-Task 9: </em> Add link to create/open loan page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://ro77-prod.herokuapp.com/Project/loan.php">https://ro77-prod.herokuapp.com/Project/loan.php</a> </td></tr>
<tr><td> <em>Sub-Task 10: </em> Briefly explain the special code implementations for loans</td></tr>
<tr><td> <em>Response:</em> <p>To explain from earlier: The loan is displayed as positive because it is<br>not included in the world total. It acts as an extension of the<br>world account, and only updates when it is counted down, in which the<br>transaction pair in the table is &quot;subtract from the loan, add to the<br>world&quot;. That way, the transaction table stays consistent.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Listing accounts should show applicable APY or - if none is set for a particular account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the account list showing a combination of checkings, savings, loans, etc</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/167313907-fa3f4fc7-c62e-4c97-8f9d-a6e04cebe5e1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>All 3 accounts with APY&#39;s<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Rogger-Ortiz/IT202-002/pull/96">https://github.com/Rogger-Ortiz/IT202-002/pull/96</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a link to the Account list page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://ro77-prod.herokuapp.com/Project/accounts.php">https://ro77-prod.herokuapp.com/Project/accounts.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> User will be able to close an account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot showing validation that an account can't be closed if it has a balance (regular account and loan)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/167314064-5b2136a7-64d2-46b3-a231-888a6dcff5bc.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Cant be closed, option not available<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/167314078-31522dc5-344a-4d46-8259-71d75f5200d1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Can be closed.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot from the DB showing a closed account as inactive</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/167314126-90886b3c-ac29-4393-83f2-e464a31899d5.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Account is set to 0.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshots of the various account list queries (in the code) showing the changes to use is_active (be sure to include ucid and date)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/167314179-a000ff41-5d2b-47f9-8c6e-734a368b0d1d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>All queries are very similar to this. I would show more but its<br>all redundant. It&#39;s more or less the same query that adds the &quot;AND<br>is_active = 1&quot;<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Rogger-Ortiz/IT202-002/pull/99">https://github.com/Rogger-Ortiz/IT202-002/pull/99</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a link to the page where a user can close an account</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://ro77-prod.herokuapp.com/Project/accounts.php">https://ro77-prod.herokuapp.com/Project/accounts.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Admin role </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of user search with search results shown (show the user's name, link to view their accounts, link to open account, and link/button to deactivate user)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/167314403-5f2eb672-cb6b-4cc3-be43-dc42155c4db6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Base Results<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/167314445-94f44ee1-ca95-40fd-bf0f-adf1515ee2bb.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Filter Results<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the updated User's table of the new is_active column</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/167314506-774ae6c7-30d8-4aee-abb8-73c2f2ac0d30.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>I accidentally named it &quot;is_disabled&quot; but its essentially the same thing. The logic<br>works with &quot;is_disabled&quot; so 1 = disabled<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the admin's view of listing another user's account (from the user search results link) Show a mix of frozen and unfrozen accounts</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/167314709-b532ba20-8917-4d97-ba3f-0fd8a7eeb3a2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Viewing a test accounts bank accounts, with 1 of them being frozen.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot of the admin's view of listing another user's transaction history</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/167314737-d588fc35-04d5-4920-a0c4-7b578a8dcf40.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Admin viewing the frozen account from before.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add screenshot of account lookup page with partial result matches (ensure it has links to the transactions page of the account and the ability to freeze/unfreeze)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/167314794-25238cda-1f96-4676-a132-6610c1ca70cd.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before Filter<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/167314801-667497ba-3e62-4ed8-b324-eebbcd624c56.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After filter.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Rogger-Ortiz/IT202-002/pull/99">https://github.com/Rogger-Ortiz/IT202-002/pull/99</a> </td></tr>
<tr><td> <em>Sub-Task 7: </em> Add related url(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://ro77-prod.herokuapp.com/Project/admin/search_users.php">https://ro77-prod.herokuapp.com/Project/admin/search_users.php</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://ro77-prod.herokuapp.com/Project/admin/search_accounts.php">https://ro77-prod.herokuapp.com/Project/admin/search_accounts.php</a> </td></tr>
<tr><td> <em>Sub-Task 8: </em> Briefly explain the code logic for the different views and admin actions</td></tr>
<tr><td> <em>Response:</em> <p>The different views are made so that it calls ALL of the given<br>users/accounts and then the filter helps reduce what is shown. The actions are<br>controlled through &quot;logout&quot; type pages, where the user is directed for a quick<br>function, before being thrown back to the original page to show the change.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> Proposal.md </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em>  Add screenshots showing your updated proposal.md file with checkmarks, dates, and link to milestone4.md accordingly and a direct link to the path on Heroku prod (see instructions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/167314865-e477af60-f6ee-48d6-ac6d-c0ba215015db.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Proposal updated<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone4 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/167315059-87467335-62fa-4017-81c9-7796f96e63ad.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>closed issues<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-002-S22/it202-milestone-4-bank-project/grade/ro77" target="_blank">Grading</a></td></tr></table>