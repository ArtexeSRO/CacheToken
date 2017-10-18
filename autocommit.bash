#!/bin/bash
git add .
echo Zadaj trefný nazov pripravovaného commitu
read -r varname
git commit -m "$varname"
git push origin master