::
:: Merge All Category in google_dorks_all.txt
::
break>google_dorks_all.txt
for /r %%i in (*.txt) do ( 
    if /i not "%%i"=="google_dorks_all.txt" (
        (type %%i & echo.) >> google_dorks_all.txt
      )
)