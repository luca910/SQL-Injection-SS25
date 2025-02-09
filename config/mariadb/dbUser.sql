-- Grant usage privileges to the 'docker' user
-- The user can connect to the server but has no privileges to do anything with the databases
-- Also, there are no limits on the number of queries, updates, connections per hour
-- Grant basic usage privileges with no limits on queries, connections, or updates
GRANT USAGE ON *.* TO 'docker'@'%' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;

-- Create a new database 'Eis' if it doesn't exist
CREATE DATABASE IF NOT EXISTS `app`;

-- Grant all privileges on the 'Eis' database to the 'Eis' user
GRANT ALL PRIVILEGES ON `app`.* TO 'docker'@'%';

-- Reload the privilege tables to ensure the changes take effect
FLUSH PRIVILEGES;
