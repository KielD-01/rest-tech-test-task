# Test Task for Hendrikus   

## How to set it up?    


1. `git clone git@github.com:KielD-01/rest-tech-test-task.git mtt && cd mtt`    
2. `cp .env.example .env`   
    1. Create a database    
    2. Update `DB_HOST | DB_DATABASE | DB_USERNAME | DB_PASSWORD` values in the `.env` file 
3. `bash setup.sh`  

Then You could serve it with the `php artisan serve` command or configure a VHost.  

Execution of the `setup.sh` will make all the work for You, It will install all the dependencies, generate a key and migrate needed tables. 
Also it will create a bunch of the users for You.   
If You would like to remove all the users with their data, just run `php artisan tenants:truncate`  
