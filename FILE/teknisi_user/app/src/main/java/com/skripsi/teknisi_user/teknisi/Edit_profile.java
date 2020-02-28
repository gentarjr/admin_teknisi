package com.skripsi.teknisi_user.teknisi;

import android.annotation.SuppressLint;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.SharedPreferences;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.skripsi.teknisi_user.Login;
import com.skripsi.teknisi_user.MainActivity;
import com.skripsi.teknisi_user.R;
import com.skripsi.teknisi_user.konfigurasi.RequestHandler;
import com.skripsi.teknisi_user.konfigurasi.konfigurasi;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;

public class Edit_profile extends AppCompatActivity implements View.OnClickListener {

    private EditText txt_username,txt_nama_lengkap, txt_email, txt_no_telp, txt_password;
    private TextView txt_id;
    private RadioGroup grup_divisi;

    private RadioButton it;
    private RadioButton jaringan;
    private RadioButton infrastruktur;

    public String it_a= "IT";
    public String jaringan_a= "JARINGAN";
    public String infra_a= "DIVISI";

    SharedPreferences sharedpreferences;
    String id;

    public static final String TAG_ID = "id";

    private Button btn_simpan;



    @Override
    protected void onCreate(Bundle savedInstanceState) {

        super.onCreate(savedInstanceState);
        setContentView(R.layout.edit_profile);
        txt_id = (TextView) findViewById(R.id.txt_id);
        txt_username = (EditText) findViewById(R.id.txt_username);
        txt_nama_lengkap = (EditText) findViewById(R.id.txt_nama_lengkap);
        txt_email = (EditText) findViewById(R.id.txt_email);
        txt_no_telp = (EditText) findViewById(R.id.txt_no_telp);
        txt_password = (EditText) findViewById(R.id.txt_password);

        grup_divisi = (RadioGroup) findViewById(R.id.grup_divisi);
        it = (RadioButton) findViewById(R.id.it);
        jaringan = (RadioButton) findViewById(R.id.jaringan);
        infrastruktur = (RadioButton) findViewById(R.id.infrastruktur);
        btn_simpan = (Button) findViewById(R.id.btn_simpan);

        sharedpreferences = getSharedPreferences(Login.my_shared_preferences, Context.MODE_PRIVATE);

        id = getIntent().getStringExtra(TAG_ID);

        txt_id.setText(id);

        btn_simpan.setOnClickListener(this);
    }

    private void showEmployee(String json){
        try {

            JSONObject jsonObject = new JSONObject(json);
            JSONArray result = jsonObject.getJSONArray(konfigurasi.TAG_JSON_ARRAY);
            JSONObject c = result.getJSONObject(    0);
            txt_username.setText(c.getString(konfigurasi.TAG_USERNAME));
            txt_nama_lengkap.setText(c.getString(konfigurasi.TAG_NAMA_LENGKAP));
            txt_email.setText(c.getString(konfigurasi.TAG_EMAIL));
            txt_no_telp.setText(c.getString(konfigurasi.TAG_NO_TELP));
            txt_password.setText(c.getString(konfigurasi.TAG_PASSWORD));
            id = getIntent().getStringExtra(TAG_ID);
        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    public void updateEmployee(){
        final String username = txt_username.getText().toString().trim();
        final String nama = txt_nama_lengkap.getText().toString();
        final String email = txt_email.getText().toString();
        final String no_telp = txt_no_telp.getText().toString();
        final String password = txt_password.getText().toString();
        final String id =  txt_id.getText().toString();


        class UpdateEmployee extends AsyncTask<Void, Void, String> {

            ProgressDialog loading;
            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(
                        Edit_profile.this,"Mengubah",
                        "Tunggu Sebentar...",false,false
                );

            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                loading.dismiss();
                Toast.makeText(Edit_profile.this, s, Toast.LENGTH_SHORT).show();
            }

            @SuppressLint("WrongThread")
            @Override
            protected String doInBackground(Void... voids) {

                HashMap<String, String> map = new HashMap<>();
                map.put(konfigurasi.KEY_ID,id);
                map.put(konfigurasi.KEY_USERNAME,username);
                map.put(konfigurasi.KEY_NAMA_LENGKAP,nama);
                map.put(konfigurasi.KEY_EMAIL,email);
                map.put(konfigurasi.KEY_NO_TELP,no_telp);
                map.put(konfigurasi.KEY_PASSWORD,password);
                if (it.isChecked()==true){
                    map.put(konfigurasi.KEY_DIVISI,String.valueOf(it_a));
                }else if(jaringan.isChecked()==true){
                    map.put(konfigurasi.KEY_DIVISI,String.valueOf(jaringan_a));
                }else if(infrastruktur.isChecked()==true){
                    map.put(konfigurasi.KEY_DIVISI,String.valueOf(infra_a));
                }
                RequestHandler rh = new RequestHandler();
                return rh.sendPostRequest(konfigurasi.URL_UPDATE_ANGGOTA,map);

            }
        }

        new UpdateEmployee().execute();
    }
    @Override
    public void onClick(View view) {
        if (view == btn_simpan){
            updateEmployee();
        }
    }
}
