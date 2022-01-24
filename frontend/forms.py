from django import forms

class FileUploadForm(forms.Form):
    f = forms.FileField(label='Select file')