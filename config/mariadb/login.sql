-- Create a table named 'login' in the 'Eis' database
CREATE TABLE app.`login` (
    -- 'id' column, auto-incremented integer, primary key
                             `id` int(5) NOT NULL AUTO_INCREMENT,

    -- 'lid' column, integer
                             `lid` int(5),

    -- 'user' column, string of max 20 characters, must be unique
                             `user` varchar(20) NOT NULL,

    -- 'mail' column, string of max 50 characters, must be unique
                             `mail` varchar(50) NOT NULL,

    -- 'pwd' column, string of max 255 characters
                             `pwd` varchar(255) NOT NULL,

    -- 'created' column, timestamp, defaults to the current timestamp
                             `created` timestamp NOT NULL DEFAULT current_timestamp(),

    -- 'uuid' column, universally unique identifier
                             `uuid` uuid NOT NULL,

    -- 'mail_verified' column, tiny integer (0 or 1)
                             `mail_verified` tinyint(1) NOT NULL,

    -- 'admin' column, boolean, defaults to false
                             `admin` boolean DEFAULT false,

    -- 'bestellungBearbeiten' column, boolean, defaults to false
                             `bestellungBearbeiten` boolean DEFAULT false,

    -- 'bestellungLoeschen' column, boolean, defaults to false
                             `bestellungLoeschen` boolean DEFAULT false,

    -- 'bestellungAufgeben' column, boolean, defaults to false
                             `bestellungAufgeben` boolean DEFAULT false,

    -- 'bestellungAbrufen' column, boolean, defaults to true
                             `bestellungAbrufen` boolean DEFAULT true,

                             `bestellungAnlegen` boolean DEFAULT false,

    -- 'bestellStatus' column, boolean, defaults to true
                             `bestellStatus` boolean DEFAULT true,

    -- 'standorteAbrufen' column, boolean, defaults to true
                             `standorteAbrufen` boolean DEFAULT true,

    -- 'standorteAnlegen' column, boolean, defaults to false
                             `standorteAnlegen` boolean DEFAULT false,

    -- 'standorteBearbeiten' column, boolean, defaults to false
                             `standorteBearbeiten` boolean DEFAULT false,

    -- 'standorteLoeschen' column, boolean, defaults to false
                             `standorteLoeschen` boolean DEFAULT false,

    -- 'sortenAbrufen' column, boolean, defaults to true
                             `sortenAbrufen` boolean DEFAULT true,

    -- 'sortenErstellen' column, boolean, defaults to false
                             `sortenErstellen` boolean DEFAULT false,

    -- 'sortenBearbeiten' column, boolean, defaults to false
                             `sortenBearbeiten` boolean DEFAULT false,

    -- 'sortenLoeschen' column, boolean, defaults to false
                             `sortenLoeschen` boolean DEFAULT false,

    -- Primary key constraint for the 'id' column
                             PRIMARY KEY (`id`),

    -- Unique key constraint for the 'mail' column
                             UNIQUE KEY `mail` (`mail`),

    -- Unique key constraint for the 'user' column
                             UNIQUE KEY `user` (`user`)
)
-- Table storage engine and character set
    ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;