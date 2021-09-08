##### v0.0.62
- Created folder api/auth
- renamed MythAuth to Jwt
##### v0.0.61
- Created Controller MythAuth in folder Api/v1/
- Created Routers for methods login and logout
##### v0.0.60
- Created Controller named Groups in Api folder
- Created methods index, show, create, update, delete in Controller Groups
- Created foçe GroupsUpdateRules in validation folder
- Created method update_name in GroupUpdateRules file
- Added validation file in file Config/Validation.php
- Finished Controller Api/V1/Groups/Controller
##### v0.0.59
- Created folder Validation in App folder
- Created file UserUpdateRules in Validation folder
- Created method update_email in UserUpdateRules file
- Added validation file in file Config/Validation.php
- Finished method update in Controller Api/V1/UserController
##### v0.0.58
- Finished logic for create new user in Controller/Api/V1/Users::create
##### v0.0.57
- Edited config in file Auth.php
- Disabled csrf filter in all api routes
- Added in Router file the routes for Controller/Api/V1/Users
- Edited Users Controllers
- Edited Users Model
##### v0.0.56
- Created file Cdr.php in Language/us/Cdr
- Update README.md
##### v0.0.54
- Update README.md
##### v0.0.53
- Inicialized Internacionalization
- Created file Cdr.php in Language/pt-BR/Cdr
##### v0.0.52
- Fixing some details about the audio
##### v0.0.51
- Updated logic to play audio
##### v0.0.50
- Inicialized logic to play audio
##### v0.0.49
- Inicialized logic to search audio
##### v0.0.48
- Edited Seeder UserSeed, now sql inster have name and lastname
- Edited View User/progife image profile
##### v0.0.47
- Small changes
##### v0.0.46
- Created method lastCalls in Model DashboardModel
- The Controller DashboardController now has a method lastCalls
- The View DashboardView now has a method lastCalls
##### v0.0.45
- Fixed an issue in Model CdrModel where it did not search
- Fixed other bugs
##### v0.0.44
- Fixed some bugs
##### v0.0.43
- Add linux compatibility
##### v0.0.42
- The methods in Controller Dashboard now receive an date
- Some visual bugs were fixed.
##### v0.0.41
- Created Model DashboardModel
- Created method searchCallsStatus in Model DashboardModel
- Created method totalCalls in Model DashboardModel
- Created method totalTimeCalls in Model DashboardModel
- View template now recive script to create charts
- View dashboard/index have two card with statistics
##### v0.0.40
- Inicialized charts
##### v0.0.39
- Fix some bugs
##### v0.0.38
- Created method in Model CDR
##### v0.0.37
- Inicialized logic to search lines in CDR
##### v0.0.37
- Created Route post for /cdr/search
- Created method search in Controller CDR
- Created method search in Model CDR
##### v0.0.36
- Included library JQueryMask
- Inicialized CDR Form
##### v0.0.35
- Created Routes for /cdr/list
- Created Controller CDR
- Created method list in Controller CDR
- Created CDR Model
- Created View list in /cdr
##### v0.0.34
- Fixed error in Toastr message
##### v0.0.33
- Created Migration CdrTable
##### v0.0.32
- Created Routes for add users in group
- Created method listUsersToAddInGroup in Controller CDR\Groups
- Created method inGroup in User Model
- Created View addUserInGroup
##### v0.0.31
- Finished logic to remove group
- Finished logic to remove user in group
##### v0.0.30
- Created Routes for /groups/delgroup
- Created Routes for /groups/remove
- Created methoid removeUserInGroup in Controller CDR\Groups
- Created methoid removeGroup in Controller CDR\Groups
- Created button to remove group in View groups/list
- Created file removeGroup.js in public/assets/js/app/groups
- Created file removeUser.js in public/assets/js/app/groups
##### v0.0.29
- Finished as permissions settings
##### v0.0.28
- Inicialized menu dynamic with permissions
##### v0.0.27
- Added filter to permitions in Routes users
- Updated method store in Controller CDR\Groups to allow insert and update
- Created View config/add
##### v0.0.26
- Created Routes with type POST for /groups/edit/
- Created method store in Controller CDR\Groups
- Created AuthGroupsPermitions
- Created AuthPermitions
- Update README.me
##### v0.0.25
- Created Routes for /config/groups add,list and edit
- Created method updateProfile in Controller CDR\Groups
- Edited descrition in seeder AuthGroupsSeed
- Created View config/edit
- Created View config/list
##### v0.0.24
- Created Seeder AuthGroupsSeed
- Created Seeder AuthGroupUsersSeed
- Update README.md
##### v0.0.23
- Initialing the creation for groups and permissions
##### v0.0.22
- The logged in username now appears on all pages
##### v0.0.21
- Fix bug in method updateProfile
##### v0.0.20
- Created method updateProfile in Controller CDR\Users
##### v0.0.19
- Created route get for users/profile
- Created method profile in Controller CDR\Users
##### v0.0.18
- Created method delete in Controller CDR\Users
- Created route GET for url users/delete
- Created button delete in View users\list
##### v0.0.17
- Created method doStatus in Controller CDR\Users
- Created route GET for url users/status
- Created button do change status in View users\list
- Created file changeStatus.js in public/assets/js/app
##### v0.0.16
- Created table to list all users in View users\list
##### v0.0.15
- Created Routes for Controller Users\list
- Created link in siderbar to View users\list
- Added files to datatables
##### v0.0.14
- Edited Routes to disallow registrations, activation and retrieval
##### v0.0.13
- Config myth to use news filds
##### v0.0.12
- Finished View users\add
- Create migration AlterTableUsers with filds name and lastname
##### v0.0.11
- Created Helper Submenu_helper
##### v0.0.10
- Created View template_alerts
- Created View users\add
- Created Route for users\add
- Created Controller CDR\Users
##### v0.0.9
- Added translation for language pt-BR
- Change time zone to America\Sao_Paulo
- Removed index.php from variable $indexPage
- Inicialized template layout
##### v0.0.8
- Edited config auth in App\Config\Auth
- Disabled auto routes in App\Config\Routes
- Created routes for /
- Removed unused View welcome_message
- Created View header in Views\layouts
- Created View sidebar in Views\layouts
- Added html tags in Views\layouts\template
##### v0.0.7
- Created Seeder UserSeed
- Update README.md
##### v0.0.6
- Finished View layouts/login
##### v0.0.5
- Inicialized login template
##### v0.0.4
- Created Auth file in Controller folder
##### v0.0.3
- Config myth-auth in project
##### v0.0.2
- Change language project to PHP
##### v0.0.1
- first commit
- Update README.md