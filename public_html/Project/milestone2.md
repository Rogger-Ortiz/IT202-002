<table><tr><td> <em>Assignment: </em> IT202 Milestone 2 Bank Project</td></tr>
<tr><td> <em>Student: </em> Rogger Ortiz(ro77)</td></tr>
<tr><td> <em>Generated: </em> 4/12/2022 10:36:05 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-002-S22/it202-milestone-2-bank-project/grade/ro77" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol>
<li>Checkout Milestone2 branch </li>
<li>Create a new markdown file called milestone2.md</li>
<li>git add/commit/push immediate</li>
<li>Fill in the milestone2.md link (from Milestone2) into the proposal.md file under each milestone2 feature</li>
<li>For each feature in the proposal add a related direct link to Heroku prod for a file related to it the feature</li>
<li>Fill in the below deliverables</li>
<li>At the end copy the markdown and paste it into milestone2.md</li>
<li>Add/commit/push the changes to Milestone2</li>
<li>PR Milestone2 to dev and verify</li>
<li>PR dev to prod and verify</li>
<li>Checkout dev locally and pull changes to get ready for Milestone 3</li>
<li>Submit the direct link to this new milestone2.md file from your GitHub prod branch to Canvas</li>
</ol>
<p>Note: Ensure all images appear properly on github and everywhere else.
Images are only accepted from dev or prod, not local host.
All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod). </p>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Create Accounts table and setup </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot from the db of the system user (Users table)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/163082495-342581ee-ccff-4f15-b2ad-c07835eeaab2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Users account with system user<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot from the db of the world account (Accounts table)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/163082738-575dd3eb-08ac-44cc-b551-1ce34374701c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Accounts table with world account<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Explain the purpose and usage of these two entries and how they relate</td></tr>
<tr><td> <em>Response:</em> <p>These entries make a &quot;fake user&quot; that keeps tabs of all of the<br>deposits and withdrawals that occur within the bank. The system user exists purely<br>to keep the tables consistent, while the world account does all of the<br>heavy liftings of calculating the banks balance.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Rogger-Ortiz/IT202-002/pull/50">https://github.com/Rogger-Ortiz/IT202-002/pull/50</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Dashboard </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the requested links/navigation</td></tr>
<tr><td> <em>Response:</em> <p><a href="https://user-images.githubusercontent.com/98473695/163083662-f9110f61-71c7-493d-a240-167b47bba7b7.png">https://user-images.githubusercontent.com/98473695/163083662-f9110f61-71c7-493d-a240-167b47bba7b7.png</a><br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Explain which ones are working for this milestone</td></tr>
<tr><td> <em>Response:</em> <p>All of them work, with the exception of Transfer, which does not have<br>a redirect<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Rogger-Ortiz/IT202-002/pull/51">https://github.com/Rogger-Ortiz/IT202-002/pull/51</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Create a checking Account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the Create Account Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/163083801-4abe90c9-df0f-4e96-8e93-2525b79160a7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Create account radio button and number field<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> </td></tr>
<tr><td> <em>Response:</em> <p>Assuming this subtask is &quot;explain what the code does&quot;, I used a radio<br>button to lessen user error, and limit error messages to only throw in<br>more limited cases. I generated a 12 digit &quot;number&quot; (held as a string)<br>and INSERT INTO the transactions table. along with the balance. I also alongside<br>the creation, insert the transaction pair, with the balance given.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshots showing validation errors and success message</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/163084045-1e871a36-1dae-46e0-a88d-3fea615488c1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>If the user attempts to submit the form without checking off &quot;Checking&quot;<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/163084104-c9c314c8-67c4-4efb-95fb-41c70083a8a5.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>If the user attempts to submit the form without putting a value to<br>deposit (or making it less than 5)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/163084421-50f4ae9f-7a8e-476a-9e09-fbfcae61cd59.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Success!<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot showing the transaction generated from the initial deposit (from the DB)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://user-images.githubusercontent.com/98473695/163084480-2189f724-3b5b-436f-b165-1a5544614cbd.png">https://user-images.githubusercontent.com/98473695/163084480-2189f724-3b5b-436f-b165-1a5544614cbd.png</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Explain which account number generation you used and the account creation process including the transaction logic</td></tr>
<tr><td> <em>Response:</em> <p>I used option 1, where it rerolls if it encounters the same number.<br>What it does is: on generation, it is in a dowhile loop that<br>continues to regenerate as long as the condition is true. The condition is<br>flipped to true when we iterate through all existing records for account_number&#39;s and<br>see that one already exists with the same number. The transaction logic takes<br>in the user input, and directly inserts it into the account on creation<br>(there is no chance of SQL injection, since the field can only accept<br>numbers, hence there is no risk). The transaction then uses that number to<br>calculate expected balance for both the User and World, and then inputs that<br>into their respective entries in the transaction table.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Rogger-Ortiz/IT202-002/pull/52">https://github.com/Rogger-Ortiz/IT202-002/pull/52</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Rogger-Ortiz/IT202-002/pull/56">https://github.com/Rogger-Ortiz/IT202-002/pull/56</a> </td></tr>
<tr><td> <em>Sub-Task 7: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://ro77-prod.herokuapp.com/Project/createaccount.php">https://ro77-prod.herokuapp.com/Project/createaccount.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> User will be able to list their accounts </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the user's account list view (show 5 accounts)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/163085060-acdb6ddd-3146-44c2-8449-14fbb91bb30e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>View of 5 Accounts<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Briefly explain how the page is displayed and the data lookup occurs</td></tr>
<tr><td> <em>Response:</em> <p>The data lookup is actually one really long SQL statement. &quot;SELECT id, account_number,<br>account_type, modified, balance FROM Accounts WHERE user_id = $uid ORDER BY modified desc<br>LIMIT 5&quot;. This just grabs the necessary information, and then using the template<br>of List Roles in our admin page, I displayed them on a table<br>that iterates and populates the table in the same fashion.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Rogger-Ortiz/IT202-002/pull/57">https://github.com/Rogger-Ortiz/IT202-002/pull/57</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://ro77-prod.herokuapp.com/Project/accounts.php">https://ro77-prod.herokuapp.com/Project/accounts.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Account Transaction Details </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of an account's transaction history (should have at least a few samples) Show account number/type, balance, opened date and transaction details</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/163087029-71acd3f6-c056-415f-9a0e-5108c1e6ff84.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Transaction Details<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Explain how the lookup and display occurs</td></tr>
<tr><td> <em>Response:</em> <p>The lookup and display is similar to the list accounts, the only difference<br>is that the result is filtered only where the account_src = user account<br>(for now, once we do transfer this logic will be updated to include<br>account_dest too)<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Rogger-Ortiz/IT202-002/pull/58">https://github.com/Rogger-Ortiz/IT202-002/pull/58</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://ro77-prod.herokuapp.com/Project/transactions.php?account=96">https://ro77-prod.herokuapp.com/Project/transactions.php?account=96</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Deposit/Withdraw </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Show a Screenshot of the Deposit Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/163087278-28763b3e-3a5a-4449-8edb-a8c61f330054.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Deposit Page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Show a Screenshot of the Withdraw Page (this potentially can be the same page with different views)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/163087358-637daeba-96a9-4217-9ddb-6a8bfdc4fc31.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Withdraw Page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Show validation error for negative numbers</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/163087433-80a5c838-4c76-4f21-b0b6-038bf47dca9f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Negative Value error<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Show validation error for withdrawing more than the account contains</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/163087532-433d5bc0-0af2-4a0d-a624-69f97f49950f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Over limit error<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Show a success message for deposit and withdraw (2 screenshots)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/163087609-98ba981d-4591-4150-aaaa-ec6933f005f0.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Deposit Success<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/163087662-a78ed13d-eeba-4dab-ac13-96149e472432.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Withdraw Success<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 6: </em> Show a screenshot of the transaction pairs in the DB for the above tests (should have accurate expected_total values)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/163087743-0a6d4d29-0e5b-4263-a572-a1983868ed34.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>I swear these are correct values. I spent like an hour making sure<br>it produced the right value. The weird 30 and 20 numbers come from<br>the deposits i made for Delivarable 5 Subtask 1<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/163087955-7297170e-11e3-4947-9447-3fbb8a121454.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This is the full list for that account<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 7: </em> Briefly explain how transactions work</td></tr>
<tr><td> <em>Response:</em> <p>Transactions take in the user input, subtract/add it from the total from the<br>already-set balance of the user and world balances. And then update with new<br>values. That new value is then grabbed and used as expected output (this<br>number should always be correct due to how my logic works)<br></p><br></td></tr>
<tr><td> <em>Sub-Task 8: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Rogger-Ortiz/IT202-002/pull/59">https://github.com/Rogger-Ortiz/IT202-002/pull/59</a> </td></tr>
<tr><td> <em>Sub-Task 9: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://ro77-prod.herokuapp.com/Project/deposit.php">https://ro77-prod.herokuapp.com/Project/deposit.php</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://ro77-prod.herokuapp.com/Project/withdraw.php">https://ro77-prod.herokuapp.com/Project/withdraw.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> Proposal.md </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em>  Add screenshots showing your updated proposal.md file with checkmarks, dates, and link to milestone1.md accordingly and a direct link to the path on Heroku prod (see instructions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/163088461-e941d594-7ae8-47ce-9b83-9e0154293f57.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>&quot;<a href="https://ro77-prod.herokuapp.com/Project/proposal.md&quot;">https://ro77-prod.herokuapp.com/Project/proposal.md&quot;</a> &lt;-- That is the link that is asked for. The screenshot is<br>the accessed proposal.md from the heroku prod. (the x&#39;s are updated on the<br>branch i promise)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone2 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/163088570-65d09eb7-565e-4cd2-82f4-3721e8f8a9fa.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>everything should be working, to my knowledge. Nothing major is NOT working. Safe<br>to say it all functions.<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-002-S22/it202-milestone-2-bank-project/grade/ro77" target="_blank">Grading</a></td></tr></table>