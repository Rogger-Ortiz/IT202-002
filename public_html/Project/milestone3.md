<table><tr><td> <em>Assignment: </em> IT202 Milestone 3 Bank Project</td></tr>
<tr><td> <em>Student: </em> Rogger Ortiz(ro77)</td></tr>
<tr><td> <em>Generated: </em> 4/30/2022 1:31:19 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-002-S22/it202-milestone-3-bank-project/grade/ro77" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol>
<li>Checkout Milestone3 branch </li>
<li>Create a new markdown file called milestone3.md</li>
<li>git add/commit/push immediate</li>
<li>Fill in the milestone3.md link (from Milestone3) into the proposal.md file under each milestone3 feature</li>
<li>For each feature in the proposal add a related direct link to Heroku prod for a file related to it the feature</li>
<li>Fill in the below deliverables</li>
<li>At the end copy the markdown and paste it into milestone3.md</li>
<li>Add/commit/push the changes to Milestone3</li>
<li>PR Milestone3 to dev and verify</li>
<li>PR dev to prod and verify</li>
<li>Checkout dev locally and pull changes to get ready for Milestone 4</li>
<li>Submit the direct link to this new milestone3.md file from your GitHub prod branch to Canvas</li>
</ol>
<p>Note: Ensure all images appear properly on GitHub and everywhere else.
Images are only accepted from dev or prod, not localhost.
All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod). </p>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> User will be able to transfer between their accounts </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of transfer page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/166115054-d59171b3-ef1a-4990-bcec-c7a6d24a9340.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Transfer Page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot showing dropdown values</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/166115067-f435499b-2ad8-4483-b446-fdae5f62eea4.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Accsrc dropdown<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/166115082-bfc8b73d-aa0a-4f70-a598-e909d00badb9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Accdest dropdown<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshot showing user can't transfer more funds than they have</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/166115102-c249502f-3d97-4579-ae57-b7c6df027367.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Over-limit error message<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add screenshot showing user can't transfer to the same account</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/166115120-b8824eb9-0b31-4462-9718-7e1cbadddb9f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Choose two diff accounts<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add screenshot showing you can't transfer an negative balance</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/166115134-00ab405d-5345-4ee5-bd0f-210fa08b4003.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Must be more than 0<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add screenshot of the generated transaction history from the db</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/166115163-13965729-01b4-4841-96db-0505285ba1d6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Mix of all the transactions, including those of &quot;Transfer&quot; type<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 7: </em> Add a screenshot of the Accounts table showing both affected accounts</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/166115200-13cbfbf4-baf2-471f-88b8-5583ccfa276f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>All of the accounts with different changes to them.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 8: </em> Briefly explain the code process/flow of a transfer including how the accounts are fetched for the dropdowns</td></tr>
<tr><td> <em>Response:</em> <p>Two accounts are selected, and the logic of both deposit and withdraw from<br>milestone 2 is applied, but replacing the world account with the respective user<br>accounts. After that, it&#39;s the same logic for the insertion into the transaction<br>table, and update of the accounts table. The accounts are fetched from the<br>dropdowns by just selecting all accounts that are owned by the user (via<br>user_id) and are looped onto the screen via a for each loop that<br>runs through a result array with all of the search query results. If<br>none are found, a default &quot;account&quot; entry is there to prevent an empty<br>dropdown list, as well as to provide a default state to validate user<br>input.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 9: </em> Add pull request(s) url</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Rogger-Ortiz/IT202-002/pull/83">https://github.com/Rogger-Ortiz/IT202-002/pull/83</a> </td></tr>
<tr><td> <em>Sub-Task 10: </em> Add link to transfer page from heroku</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://ro77-prod.herokuapp.com/Project/transfer.php">https://ro77-prod.herokuapp.com/Project/transfer.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Transaction History Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of transaction history page showing the new transfer transaction</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/166115462-140e041c-e34c-4c1b-a26a-76091686bb8d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Transfer transactions<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots demonstrating the filters and pagination</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/166115491-cbfd81bb-22aa-4ce0-9508-58396d26975d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Pagination (Page 2)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/166115533-3bc7057d-9369-4c54-947f-ecdc793f0307.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Filter By date + type<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how the filters/pagination work</td></tr>
<tr><td> <em>Response:</em> <p>The filters add conditional statements to a master SQL query that is sent<br>every time the submit button is pressed. Pagination works by Limit/Offset to select<br>intermittent entries, which are dictated by the page number; a $_GET variable stored<br>in the url.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add pull request(s) url</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Rogger-Ortiz/IT202-002/pull/84">https://github.com/Rogger-Ortiz/IT202-002/pull/84</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add link to transfer page from heroku</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://ro77-prod.herokuapp.com/Project/accounts.php">https://ro77-prod.herokuapp.com/Project/accounts.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> User's profile First name and Last name </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the user's profile with the new fields</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/166115576-cefc0dda-08a5-4abe-bcf7-6a52056e8d59.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>New Fields for users first and last name<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add pull request(s) url</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Rogger-Ortiz/IT202-002/pull/85">https://github.com/Rogger-Ortiz/IT202-002/pull/85</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add link to transfer page from heroku</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://ro77-prod.herokuapp.com/Project/profile.php">https://ro77-prod.herokuapp.com/Project/profile.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> User will be able to transfer funds to another user </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the external transfer page with filled in data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/166115783-c537cedb-1f7d-4418-8b6a-5a63e0e70ae1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Telle Page! (Yes, its a play on Zelle :p)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot showing user can't send more than they have</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/166115814-17135880-4486-406a-8dcb-773664ef21c3.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Must be within limits<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshot showing they can't send a negative amount</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/166115830-a0a94952-c47e-4039-b60e-1007d431618f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Must be over $1<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add screenshot(s) showing message if a user doesn't exist and/or a destination account wasn't found</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/166115860-257d96e5-c0de-443c-a266-57a0d2d9eb7a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>No such destination<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add screenshot of the transactions table showing the recorded transfer</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/166115886-3cbe45dd-1c06-4e7a-8add-8b67991b0be7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Ext-Transfer in transactions<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add screenshot(s) showing the updated account balances</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/166115910-5b1bf26d-a81d-4ebb-bcd8-514d5bff2aca.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Added/Subtracted Account balances<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 7: </em> Briefly explain the process of looking up the target user's account and the validation logic</td></tr>
<tr><td> <em>Response:</em> <p>Similar to the filters, the inputs for the destination are appended WHERE, LIKE,<br>and AND clauses that specify what to look for. Then the returned data<br>is either null (throws the exception) or populated (which carries out the transaction)<br></p><br></td></tr>
<tr><td> <em>Sub-Task 8: </em> Add pull request(s) url</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Rogger-Ortiz/IT202-002/pull/86">https://github.com/Rogger-Ortiz/IT202-002/pull/86</a> </td></tr>
<tr><td> <em>Sub-Task 9: </em> Add link to transfer page from heroku</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://ro77-prod.herokuapp.com/Project/telle.php">https://ro77-prod.herokuapp.com/Project/telle.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Proposal.md </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em>  Add screenshots showing your updated proposal.md file with checkmarks, dates, and link to milestone3.md accordingly and a direct link to the path on Heroku prod (see instructions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/166116099-2b1d7142-9174-4744-884d-0271de9041d6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Markdown file on heroku prod<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone3 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98473695/166116118-598ccaa5-3ab4-4a0b-891f-dea7894c06c4.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Milestone 3 issues in done<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-002-S22/it202-milestone-3-bank-project/grade/ro77" target="_blank">Grading</a></td></tr></table>