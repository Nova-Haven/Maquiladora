## Maquiladora
A product to simply show the CSV values on a table after logging in with PHP

### Prep
1. Run `sqlite3 data/db.sqlite < data/prep.sqlite.sql` to set up the db, adding the login info in the process (default password `admin123`)

2. Open Notepad (or whatever) and create a file called `exportChecker.bat` (ensure there's no `.txt` at the end, and if there is, **remove it**!) with the following content:

```bash
@echo off
"C:\path\to\php.exe" "C:\path\to\your\project\check_exports.php"
```
 
3. Set up the service
- Open Task Scheduler
- Create Basic Task
- Name it "Check Exports"
- Set trigger to run every X minutes (or days, according to how often you want new exports to be handled)
- Action: Start a program
- Program: Select the batch file created above