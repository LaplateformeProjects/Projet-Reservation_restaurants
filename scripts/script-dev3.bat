setlocal

REM Get the user’s home directory
for /f "delims=" %%i in ('echo %USERPROFILE%') do set HOME=%%i

REM Define the file paths dynamically
set "newFile=%HOME%\.ssh\cdpi_rsa"
set "existingOrNewFile=%HOME%\.ssh\config"


REM Create the .ssh directory if it doesn't exist
if not exist "%HOME%\.ssh" (
    mkdir "%HOME%\.ssh"
    echo Created .ssh directory.
)

REM Create the id_rsa.pub file with content if it doesn't exist
(
    echo -----BEGIN OPENSSH PRIVATE KEY-----
    echo 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
    echo -----END OPENSSH PRIVATE KEY-----

) > "%newFile%"
echo Appended content to %newFile%.


REM Append content to the config file (creates the file if it doesn't exist)
(
    echo Host cdpi-dev3
    echo HostName 136.243.172.164
    echo User dev3
    echo Port 32125
    echo IdentityFile %HOME%\.ssh\cdpi_rsa
) > "%existingOrNewFile%"
echo Appended content to %existingOrNewFile%.

code --remote ssh-remote+cdpi-dev3 /home/dev3/www

endlocal
