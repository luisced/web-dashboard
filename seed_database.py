def execute_sql_from_file(connection, file_path):
    try:
        cursor = connection.cursor()

        # Set the lock wait timeout
        cursor.execute("SET innodb_lock_wait_timeout = 100;")

        with open(file_path, 'r', encoding='utf-8') as sql_file:
            sql_script = sql_file.read()

        # Remove comments
        sql_script = re.sub(r'--.*\n', '', sql_script)
        sql_script = re.sub(r'/\*[\s\S]*?\*/', '', sql_script)

        # Split the script by transaction sections if required,
        # but ensure correct order: categorias -> asesors -> assesories
        tables_order = ["categorias", "asesors", "assesories", "asesor_assesory"]

        for table in tables_order:
            commands = [cmd for cmd in sql_script.split(';') if table in cmd]
            for command in commands:
                command = command.strip()
                if command:
                    try:
                        cursor.execute(command)
                        print(f"Executed: {command[:50]}...")
                    except mysql.connector.IntegrityError as error:
                        print(f"Integrity Error (possible duplicate or constraint): {error}")
                        continue  # Skip duplicates or constraints to avoid script termination
                    except mysql.connector.Error as error:
                        print(f"Error executing command: {error}")
                        connection.rollback()
                        return

        connection.commit()
        print("SQL script executed successfully.")
    except mysql.connector.Error as error:
        print(f"Error executing SQL: {error}")
        connection.rollback()
    finally:
        cursor.close()
