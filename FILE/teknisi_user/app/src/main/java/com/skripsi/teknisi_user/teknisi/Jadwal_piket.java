package com.skripsi.teknisi_user.teknisi;

import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.os.AsyncTask;
import android.os.Bundle;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.SimpleAdapter;

import androidx.appcompat.app.AppCompatActivity;

import com.skripsi.teknisi_user.R;
import com.skripsi.teknisi_user.konfigurasi.RequestHandler;
import com.skripsi.teknisi_user.konfigurasi.konfigurasi;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;

public class Jadwal_piket extends AppCompatActivity {


    private ListView listView;
    private String JSON_STRING;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.jadwal_piket);

        listView = (ListView) findViewById(R.id.listView_jadwal);
        getJSON();
    }

    private void showEmployee(){

        JSONObject jsonObject;
        ArrayList<HashMap<String, String>> list = new ArrayList<>();
        try {
            jsonObject = new JSONObject(JSON_STRING);
            JSONArray result = jsonObject.getJSONArray(konfigurasi.TAG_JSON_ARRAY);

            for (int i = 0; i < result.length();i++){

                JSONObject object = result.getJSONObject(i);
                /*String id = object.getString(konfigurasi.TAG_ID);*/
                String teknisi = object.getString(konfigurasi.TAG_TEKNISI);
                String nip = object.getString(konfigurasi.TAG_NIP);
                String tanggal = object.getString(konfigurasi.TAG_JAM);
                String shift = object.getString(konfigurasi.TAG_SHIFT);

                HashMap<String, String> employees = new HashMap<>();
                /*employees.put(konfigurasi.TAG_ID,id);*/
                employees.put(konfigurasi.TAG_TEKNISI,teknisi);
                employees.put(konfigurasi.TAG_NIP,nip);
                employees.put(konfigurasi.TAG_JAM,tanggal);
                employees.put(konfigurasi.TAG_SHIFT,shift);

                list.add(employees);
            }
        } catch (JSONException e) {
            new AlertDialog.Builder(Jadwal_piket.this)
                    .setMessage(e.getMessage())
                    .show();
        }catch (NullPointerException e){
            new AlertDialog.Builder(Jadwal_piket.this)
                    .setMessage(e.getMessage())
                    .show();
        }

        ListAdapter adapter = new SimpleAdapter(
                Jadwal_piket.this,list,R.layout.list_jadwal_piket,
                new String[] {konfigurasi.TAG_TEKNISI,
                        konfigurasi.TAG_NIP,
                        konfigurasi.TAG_JAM,
                        konfigurasi.TAG_SHIFT},
                new int[] {R.id.teknisi_jadwal,R.id.nip_jadwal,R.id.jam_jadwal,R.id.shift_jadwal});
        listView.setAdapter(adapter);
    }

    private void getJSON(){

        class GetJSON extends AsyncTask<Void, Void, String> {
            ProgressDialog loading;

            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(
                        Jadwal_piket.this,
                        "Mengambil Data",
                        "Mohon tunggu...",
                        false,true);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                loading.dismiss();
                JSON_STRING = s;
                showEmployee();
            }

            @Override
            protected String doInBackground(Void... voids) {
                RequestHandler rh = new RequestHandler();
                String s =rh.sendGetRequest(konfigurasi.URL_DETAIL_JADWAL,Jadwal_piket.this);
                return s;
            }
        }

        GetJSON js = new GetJSON();
        js.execute();
    }
}
